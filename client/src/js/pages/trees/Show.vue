<template>
    <div>
    <v-select
      label="name"
      v-model="selected_option"
      :reduce="person => person.id"
      :options="persons"
      @input="setSelected"
    />
    <div id="tree"></div>
    <button id='saveButton'>Export my PNG</button>
  </div>
</template>
<script>
import * as d3Base from 'd3'
import {coordQuad, dagConnect, dagStratify, decrossOpt, layeringSimplex, sugiyama} from 'd3-dag'
import d3Tip from 'd3-tip'
import vSelect from 'vue-select'
import gedcom from '@/static/gedcom.json'
import { sampleData } from './data'
const d3 = Object.assign({}, d3Base, {tip: d3Tip()})
Array.prototype.remove = function () {
  let what, a = arguments, L = a.length, ax
  while (L && this.length) {
    what = a[--L];
    while ((ax = this.indexOf(what)) !== -1) {
      this.splice(ax, 1)
    }
  }
  return this
};
export default {
  layout: 'auth',
  components: {
    vSelect,
  },
  data: () => ({
    persons: [],
    selected_option: null,
    data: {},
    all_nodes: [],
    tree: null,
    dag: null,
    svg: null,
    g: null,
    tip: null,
    duration: 750,
    zoom: null,
    isLoading: true,
    fullPage: true,
    color: '#4fcf8d',
    backgroundColor: '#ffffff',
  }),
  mounted() {
    this.fetchdata()
  },
  async created() {
    this.persons = await this.$axios.$get("/api/person")
  },
  methods: {
    async setSelected(value) {
      this.isLoading = true
      const params = {
        start_id: value,
      }
      try {
        await this.$axios
          .$get("/api/pedigree/show", {params})
        this.data = gedcom
        this.data.links = this.data.links
          .map((item) => item.map(childItem => childItem.toString()))
        d3.selectAll("#tree")
          .selectAll('svg').remove()
        this.isLoading = false
        // setTimeout(this.generate, 1000)
      } catch {
      }
      this.isLoading = false
    },
    async fetchdata() {
      this.isLoading = true
      try {
        // this.data = await this.$axios.$get("/api/pedigree/show")
        this.data = sampleData
        this.isLoading = false
        this.generate()
      } catch {
      }
      this.isLoading = false
    },
    generate() {
      // mark unions
      Object.keys(this.data.unions)
        .forEach(key => this.data.unions[key].isUnion = true)
      // mark persons
      Object.keys(this.data.persons)
        .forEach(key => this.data.persons[key].isUnion = false)
      let margin = {top: 20, right: 0, bottom: 30, left: 0},
        width = 1500 - margin.left - margin.right,
        height = 800 - margin.top - margin.bottom
      // Set the dimensions and margins of the diagram
      let screen_width = width,
        screen_height = height
      // initialize panning, zooming
      this.zoom = d3.zoom()
        .on("zoom", (event, d) => this.g.attr("transform", event.transform))
      // initialize tooltips
      this.tip = d3.tip
        .attr('class', 'd3-tip')
        .direction('e')
        .offset([0, 5])
        .html((d) => {
          if (d.data.isUnion) {
            return
          }
          let content = `
              <span style='margin-left: 2.5px;'><b>` + d.data.name + `</b></span><br>
                <table style="margin-top: 2.5px;">
                  <tr><td>born</td><td>` + (d.data.birthyear || "?") + ` in ` + (d.data.birthplace || "?") + `</td></tr>
                  <tr><td>died</td><td>` + (d.data.deathyear || "?") + ` in ` + (d.data.deathplace || "?") + `</td></tr>
                </table>`
          return content.replace(new RegExp("null", "g"), "?")
        })
      // append the svg object to the body of the page
      // assigns width and height
      // activates zoom/pan and tooltips
      this.svg = d3.select("#tree").append("svg")
        .attr("width", screen_width)
        .attr("height", screen_height)
        .call(this.zoom)
        .call(this.tip)
      // append group element
      this.g = this.svg.append("g");
      // helper letiables
      let i = 0,
        x_sep = 120,
        y_sep = 50;
      // declare a dag layout
      try {
        this.tree = sugiyama()
          .nodeSize(() => [y_sep, x_sep])
          .layering(layeringSimplex())
          .decross(decrossOpt())
          .coord(coordQuad());
        // .separation((a, b) => { return 1 });
      } catch (e) {
      }
      // make dag from edge list
      this.dag = dagConnect()(this.data.links)
      // in order to make the family tree work, the dag
      // must be a node with id undefined. create that node if
      // not done automaticaly
      if (!!this.dag.id) {
        let root = this.dag.copy()
        root.id = undefined
        // root.__private_0_t = [this.dag]
        this.dag = root
      }
      // prepare node data
      this.all_nodes = this.dag.descendants()
      this.all_nodes.forEach(n => {
        // TODO: Refactored as of 20.05.2021. Keep going from here[1]*
        n.data = this.data.persons[n.data.id] ? this.data.persons[n.data.id] : this.data.unions[n.data.id]
        n.childrens = n.children() // all nodes collapsed by default
        n._children = n.children() // all nodes collapsed by default
        n.inserted_nodes = []
        n.inserted_roots = []
        n.neighbors = []
        n.visible = false
        n.inserted_connections = []
      })
      // find root node and assign data
      // TODO: [1] - fix find by n.id
      let root = this.all_nodes.find(n => n.data.id === this.data.start)
      root.visible = true
      root.neighbors = []
      root.neighbors = this.getNeighbors(root)
      root.x0 = screen_height / 2
      root.y0 = screen_width / 2
      console.log('root.neighbors ====', root.neighbors)
      // overwrite dag root nodes
      // this.dag.__private_0_t = [root]
      console.log('root.dag ====', this.dag)
      // draw dag
      this.update(root)
    },
    // remove root nodes and circle-connections
    remove_inserted_root_nodes(n) {
      // remove all inserted root nodes
      // this.dag.__private_0_t = this.dag.__private_0_t.filter(c => !n.inserted_roots.includes(c))
      // remove inserted connections
      n.inserted_connections.forEach(
        arr => {
          // check existence to prevent double entries
          // which will cause crashes
          if (arr[0].childrens.includes(arr[1])) {
            arr[0]._children.push(arr[1])
            arr[0].childrens.remove(arr[1])
          }
        }
      )
      // repeat for all inserted nodes
      n.inserted_nodes.forEach(this.remove_inserted_root_nodes);
    },
    // collapse a node
    collapse(d) {
      this.remove_inserted_root_nodes(d);
      // collapse neighbors which are visible and have been inserted by this node
      let vis_inserted_neighbors = d.neighbors.filter(n => n.visible && d.inserted_nodes.includes(n));
      console.log('vis_inserted_neighbors =======', vis_inserted_neighbors)
      vis_inserted_neighbors.forEach(
        n => {
          // tag invisible
          n.visible = false;
          // if child, delete connection
          if (d.childrens.includes(n)) {
            d._children.push(n);
            d.childrens.remove(n);
          }
          // if parent, delete connection
          if (n.childrens.includes(d)) {
            n._children.push(d);
            n.childrens.remove(d);
          }
          // if union, collapse the union
          if (n.data.isUnion) {
            this.collapse(n);
          }
          // remove neighbor handle from clicked node
          d.inserted_nodes.remove(n);
        }
      );
    },
    add_root_nodes(n) {
      // add previously inserted root nodes (partners, parents)
      // n.inserted_roots.forEach(p => this.dag.__private_0_t.push(p));
      // add previously inserted connections (circles)
      n.inserted_connections.forEach(
        arr => {
          // check existence to prevent double entries
          // which will cause crashes
          if (arr[0]._children.includes(arr[1])) {
            arr[0].childrens.push(arr[1]);
            arr[0]._children.remove(arr[1]);
          }
        }
      )
      // repeat with all inserted nodes
      n.inserted_nodes.forEach(this.add_root_nodes)
    },
    // uncollapse a node
    uncollapse(d, make_roots) {
      if (d === undefined) return;
      // neighbor nodes that are already visible (happens when
      // circles occur): make connections, save them to
      // destroy / rebuild on collapse
      let extended_neighbors = d.neighbors.filter(n => n.visible)
      console.log('extended_neighbors =======', extended_neighbors)
      extended_neighbors.forEach(
        n => {
          // if child, make connection
          if (d._children.includes(n)) {
            d.inserted_connections.push([d, n]);
          }
          // if parent, make connection
          if (n._children.includes(d)) {
            d.inserted_connections.push([n, d]);
          }
        }
      )
      // neighbor nodes that are invisible: make visible, make connections,
      // add root nodes, add to inserted_nodes
      let collapsed_neighbors = d.neighbors.filter(n => !n.visible);
      collapsed_neighbors.forEach(
        n => {
          // collect neighbor data
          n.neighbors = this.getNeighbors(n);
          // tag visible
          n.visible = true;
          // if child, make connection
          if (d._children.includes(n)) {
            d.childrens.push(n);
            d._children.remove(n);
          }
          // if parent, make connection
          if (n._children.includes(d)) {
            n.childrens.push(d);
            n._children.remove(d);
            // insert root nodes if flag is set
            if (make_roots && !d.inserted_roots.includes(n)) {
              d.inserted_roots.push(n);
            }
          }
          // if union, uncollapse the union
          if (n.data.isUnion) {
            this.uncollapse(n, true);
          }
          // save neighbor handle in clicked node
          d.inserted_nodes.push(n);
        }
      )
      // make sure this step is done only once
      if (!make_roots) {
        this.add_root_nodes(d);
      }
    },
    is_extendable(node) {
      return node.neighbors.filter(n => !n.visible).length > 0
    },
    getNeighbors(node) {
      if (node.data.isUnion) {
        return this.getChildren(node)
          .concat(this.getPartners(node))
      } else {
        return this.getOwnUnions(node)
          .concat(this.getParentUnions(node))
      }
    },
    getParentUnions(node) {
      if (node === undefined) return [];
      if (node.data.isUnion) return [];
      let u_id = node.data.parent_union;
      if (u_id) {
        let union = this.all_nodes.find(n => n.data.id === u_id);
        return [union].filter(u => u !== undefined);
      } else return [];
    },
    getParents(node) {
      let parents = [];
      if (node.data.isUnion) {
        node.data.partner.forEach(
          p_id => parents.push(this.all_nodes.find(n => n.data.id === p_id))
        );
      } else {
        let parent_unions = this.getParentUnions(node);
        parent_unions.forEach(
          u => parents = parents.concat(this.getParents(u))
        );
      }
      return parents.filter(p => p !== undefined)
    },
    getOtherPartner(node, union_data) {
      let partner_id = union_data.partner.find(
        p_id => p_id !== node.data.id && p_id !== undefined
      );
      return this.all_nodes.find(n => n.data.id === partner_id)
    },
    getPartners(node) {
      let partners = [];
      // return both partners if node argument is a union
      if (node.data.isUnion) {
        node.data.partner.forEach(
          p_id => partners.push(this.all_nodes.find(n => n.data.id === p_id))
        )
      }
      // return other partner of all unions if node argument is a person
      else {
        let own_unions = this.getOwnUnions(node);
        own_unions.forEach(
          u => {
            partners.push(this.getOtherPartner(node, u.data))
          }
        )
      }
      return partners.filter(p => p !== undefined)
    },
    getOwnUnions(node) {
      if (node.data.isUnion) return [];
      let unions = [];
      node.data.own_unions.forEach(
        u_id => unions.push(this.all_nodes.find(n => n.data.id === u_id))
      );
      return unions.filter(u => u !== undefined)
    },
    getChildren(node) {
      let children = [];
      if (node.data.isUnion) {
        children = node.childrens.concat(node._children);
      } else {
        let own_unions = this.getOwnUnions(node);
        own_unions.forEach(
          u => children = children.concat(this.getChildren(u))
        )
      }
      // sort children by birth year, filter undefined
      children = children
        .filter(c => c !== undefined)
        .sort((a, b) => Math.sign((this.getBirthYear(a) || 0) - (this.getBirthYear(b) || 0)));
      return children
    },
    getBirthYear(node) {
      return new Date(node.data.birthyear || NaN).getFullYear()
    },
    getDeathYear(node) {
      return new Date(node.data.deathyear || NaN).getFullYear()
    },
    find_path(n) {
      let parents = this.getParents(n);
      let found = false;
      let result = null;
      parents.forEach(
        p => {
          if (p && !found) {
            if (p.id === "profile-89285291") {
              found = true;
              result = [p, n];
            } else {
              result = this.find_path(p);
              if (result) {
                found = true;
                result.push(n)
              }
            }
          }
        }
      )
      return result
    },
    update(source) {
      // Assigns the x and y position for the nodes
      console.log('update dag ====== ', this.dag)
      if (source.data.id !== this.data.start) return false;
      let dag_tree = this.tree(this.dag);
      let nodes = this.dag.descendants();
      let links = this.dag.links();
      // ****************** Nodes section ***************************
      // Update the nodes...
      let node = this.g.selectAll('g.node')
        .data(nodes, (d) => {
          return d.data.id || (d.data.id = ++i);
        })
      // Enter any new nodes at the parent's previous position.
      let nodeEnter = node.enter().append('g')
        .attr('class', 'node')
        .attr("transform", (d) => {
          return "translate(" + source.y0 + "," + source.x0 + ")";
        })
        .on('click', this.onClick)
        .on('mouseover', (e, d) => this.tip.show(d, e.target))
        .on('mouseout', (e, d) => this.tip.hide(d, e.target))
        .attr('visibility', 'visible');
      // Add Circle for the nodes
      nodeEnter.append('circle')
        .attr('class', 'node')
        .attr('r', 1e-6)
        .style("fill", (d) => {
          return this.is_extendable(d) ? "lightsteelblue" : "#fff";
        });
      // Add names as node labels
      nodeEnter.append('text')
        .attr("dy", "-2")
        .attr("x", 13)
        .attr("text-anchor", "start")
        .text(d => d.data.name);
      // add birth date and death date as labels
      nodeEnter.append('text')
        .attr("dy", "10")
        .attr("x", 13)
        .attr("text-anchor", "start")
        .text(
          (d) => {
            if (d.data.isUnion) return;
            return (d.data.birthyear || "?") +
              " - " +
              (d.data.deathyear || "?")
          }
        );
      // UPDATE
      let nodeUpdate = nodeEnter.merge(node);
      // Transition to the proper position for the node
      nodeUpdate.transition()
        .duration(this.duration)
        .attr("transform", (d) => {
          return "translate(" + d.y + "," + d.x + ")";
        });
      // Update the node attributes and style
      nodeUpdate.select('circle.node')
        .attr('r', d => 10 * !d.data.isUnion)
        .style("fill", (d) => {
          return this.is_extendable(d) ? "lightsteelblue" : "#fff";
        })
        .attr('cursor', 'pointer');
      // Remove any exiting nodes
      let nodeExit = node.exit().transition()
        .duration(this.duration)
        .attr("transform", (d) => {
          return "translate(" + source.y + "," + source.x + ")";
        })
        .attr('visibility', 'hidden')
        .remove();
      // On exit reduce the node circles size to 0
      nodeExit.select('circle')
        .attr('r', 1e-6);
      // On exit reduce the opacity of text labels
      nodeExit.select('text')
        .style('fill-opacity', 1e-6);
      // ****************** links section ***************************
      // Update the links...
      let link = this.g.selectAll('path.link')
        .data(links, (d) => {
          return d.source.id + d.target.id
        });
      // Enter any new links at the parent's previous position.
      let linkEnter = link.enter().insert('path', "g")
        .attr("class", "link")
        .attr('d', (d) => {
          let o = {x: source.x0, y: source.y0}
          return this.diagonal(o, o)
        });
      // UPDATE
      let linkUpdate = linkEnter.merge(link);
      // Transition back to the parent element position
      linkUpdate.transition()
        .duration(this.duration)
        .attr('d', d => this.diagonal(d.source, d.target));
      // Remove any exiting links
      let linkExit = link.exit().transition()
        .duration(this.duration)
        .attr('d', (d) => {
          let o = {x: source.x, y: source.y}
          return this.diagonal(o, o)
        })
        .remove();
      // expanding a big subgraph moves the entire dag out of the window
      // to prevent this, cancel any transformations in y-direction
      this.svg.transition()
        .duration(this.duration)
        .call(
          this.zoom.transform,
          d3.zoomTransform(this.g.node()).translate(-(source.y - source.y0), -(source.x - source.x0)),
        );
      // Store the old positions for transition.
      nodes.forEach((d) => {
        d.x0 = d.x;
        d.y0 = d.y;
      });
      d3.select('#saveButton').on('click', () => {
        let svgString = this.getSVGString(this.svg.node());
        this.svgString2Image(svgString, 2 * width, 2 * height, 'png', this.onSave); // passes Blob and filesize String to the callback
      });
    },
    // Creates a curved (diagonal) path from parent to the child nodes
    diagonal(s, d) {
      let path = `M ${s.y} ${s.x}
                C ${(s.y + d.y) / 2} ${s.x},
                  ${(s.y + d.y) / 2} ${d.x},
                  ${d.y} ${d.x}`
      return path
    },
    getCSSStyles(parentElement) {
      let selectorTextArr = [];
      // Add Parent element Id and Classes to the list
      selectorTextArr.push('#' + parentElement.id);
      for (let c = 0; c < parentElement.classList.length; c++)
        if (!contains('.' + parentElement.classList[c], selectorTextArr))
          selectorTextArr.push('.' + parentElement.classList[c]);
      // Add Children element Ids and Classes to the list
      let nodes = parentElement.getElementsByTagName("*");
      for (let i = 0; i < nodes.length; i++) {
        let id = nodes[i].id;
        if (!contains('#' + id, selectorTextArr))
          selectorTextArr.push('#' + id);
        let classes = nodes[i].classList;
        for (let c = 0; c < classes.length; c++)
          if (!contains('.' + classes[c], selectorTextArr))
            selectorTextArr.push('.' + classes[c]);
      }
      // Extract CSS Rules
      let extractedCSSText = "";
      for (let i = 0; i < document.styleSheets.length; i++) {
        let s = document.styleSheets[i];
        try {
          if (!s.cssRules) continue;
        } catch (e) {
          if (e.name !== 'SecurityError') throw e; // for Firefox
          continue;
        }
        let cssRules = s.cssRules;
        for (let r = 0; r < cssRules.length; r++) {
          if (contains(cssRules[r].selectorText, selectorTextArr))
            extractedCSSText += cssRules[r].cssText;
        }
      }
      return extractedCSSText;
      function contains(str, arr) {
        return arr.indexOf(str) === -1 ? false : true;
      }
    },
    appendCSS(cssText, element) {
      let styleElement = document.createElement("style");
      styleElement.setAttribute("type", "text/css");
      styleElement.innerHTML = cssText;
      let refNode = element.hasChildNodes() ? element.children[0] : null;
      element.insertBefore(styleElement, refNode);
    },
    // Below are the functions that handle actual exporting:
    // getSVGString ( svgNode ) and svgString2Image( svgString, width, height, format, callback )
    getSVGString(svgNode) {
      svgNode.setAttribute('xlink', 'http://www.w3.org/1999/xlink');
      let cssStyleText = this.getCSSStyles(svgNode);
      this.appendCSS(cssStyleText, svgNode);
      let serializer = new XMLSerializer();
      let svgString = serializer.serializeToString(svgNode);
      svgString = svgString.replace(/(\w+)?:?xlink=/g, 'xmlns:xlink='); // Fix root xlink without namespace
      svgString = svgString.replace(/NS\d+:href/g, 'xlink:href'); // Safari NS namespace fix
      return svgString;
    },
    svgString2Image(svgString, width, height, format, callback) {
      format = format ? format : 'png';
      let imgsrc = 'data:image/svg+xml;base64,' + btoa(unescape(encodeURIComponent(svgString))); // Convert SVG string to data URL
      let canvas = document.createElement("canvas");
      let context = canvas.getContext("2d");
      canvas.width = width;
      canvas.height = height;
      let image = new Image();
      image.onload = () => {
        context.clearRect(0, 0, width, height);
        context.drawImage(image, 0, 0, width, height);
        canvas.toBlob((blob) => {
          let filesize = Math.round(blob.length / 1024) + ' KB';
          if (callback) callback(blob, filesize);
        });
      };
      image.src = imgsrc;
    },
    // Toggle unions, children, partners on click.
    onClick(e, d) {
      // do nothing if node is union
      if (d.data.isUnion) return;
      console.log('click d ===============', this.is_extendable(d))
      // uncollapse if there are uncollapsed unions / children / partners
      if (this.is_extendable(d)) this.uncollapse(d)
      // collapse if fully uncollapsed
      else this.collapse(d)
      this.update(d);
    },
    onSave(dataBlob, filesize) {
      // saveAs(dataBlob, 'D3 vis exported to PNG.png'); // FileSaver.js function
    }
  },
}
</script>
<style>
.node circle {
  fill: #fff;
  stroke: steelblue;
  stroke-width: 3px;
}
.node text {
  font: 12px sans-serif;
}
.link {
  fill: none;
  stroke: #ccc;
  stroke-width: 2px;
}
.d3-tip {
  font: 12px sans-serif;
  padding: 12px;
  background: rgba(0, 0, 0, 0.8);
  color: #fff;
  border-radius: 2px;
}
</style>
<script src="https://cdn.jsdelivr.net/npm/d3-dag@0.3.4/dist/d3-dag.min.js"></script>
<script>
import * as d3 from 'd3';
import * as _dag from 'd3-dag';
import {tip} from 'd3-tip';
export default {
    name: 'Show',
    data() {
        return{
            data :{
                start: 4,
                links: [[3, "u1"], [2, "u2"], [2, "u1"], ["u2", 4]],
                unions: {'u1': {id: "u1", partner: [2, 3], children: []},
                'u2': {id: "u2", partner: [2, null], children: [4]} },
                persons: {
                    2: {
                        appellative: null,
                        bank: null,
                        bank_account: null,
                        birthday: null,
                        parent_union: null,
                        created_at: "2020-06-09T15:17:59.000000Z",
                        created_by: 1,
                        deleted_at: null,
                        description: null,
                        email: null,
                        givn: "Robert Eugene",
                        id: 2,
                        name: "Robert Eugene /Williams/",
                        obs: null,
                        own_unions: ["u1", "u2"],
                        phone: null,
                        sex: "M",
                        surn: "Williams",
                        title: null,
                        uid: null,
                        updated_at: "2020-06-09T15:17:59.000000Z",
                        updated_by: 1,
                    },
                    3: {
                        appellative: null,
                        bank: null,
                        bank_account: null,
                        birthday: null,
                        parent_union: null,
                        created_at: "2020-06-09T15:17:59.000000Z",
                        created_by: 1,
                        deleted_at: null,
                        description: null,
                        email: null,
                        givn: "Mary Ann",
                        id: 3,
                        name: "Mary Ann /Williams/",
                        obs: null,
                        own_unions: ["u1", "u2"],
                        phone: null,
                        sex: "M",
                        surn: "Wilson",
                        title: null,
                        uid: null,
                        updated_at: "2020-06-09T15:17:59.000000Z",
                        updated_by: 1,
                    },
                    4: {
                        appellative: null,
                        bank: null,
                        bank_account: null,
                        birthday: null,
                        parent_union: 2,
                        created_at: "2020-06-09T15:17:59.000000Z",
                        created_by: 1,
                        deleted_at: null,
                        description: null,
                        email: null,
                        givn: "4Mary Ann",
                        id: 3,
                        name: "4Mary Ann /Williams/",
                        obs: null,
                        own_unions: ["u1", "u2"],
                        phone: null,
                        sex: "M",
                        surn: "4Wilson",
                        title: null,
                        uid: null,
                        updated_at: "2020-06-09T15:17:59.000000Z",
                        updated_by: 1,
                    },
                    },
                },
            all_nodes: null,
            tree: null,
            dag: null,
            g: null,
            duration: null,
            svg: null,
            zoom: null,
            nest: 3,
        }
    },
    mounted() {
        Array.prototype.remove = function () {
            var what, a = arguments, L = a.length, ax;
            while (L && this.length) {
                what = a[--L];
                while ((ax = this.indexOf(what)) !== -1) {
                    this.splice(ax, 1);
                }
            }
            return this;
        };
        // this.generateTree();
        this.fecthData();
    },
    created() {
        // mark unions
    },
    computed: {
        fetchLink() {
            return '/api/trees/show';
        },
    },
    methods: {
        newlink(id) {
            this.$router.push(id);
        },
        is_extendable(node) {
            return node.neighbors.filter(n => !n.visible).length > 0
        },
        collapse(d) {
            // remove root nodes and circle-connections
            var remove_inserted_root_nodes = n => {
                // remove all inserted root nodes
                this.dag.children = this.dag.children.filter(c => !n.inserted_roots.includes(c));
                // remove inserted connections
                n.inserted_connections.forEach(
                    arr => {
                        // check existence to prevent double entries
                        // which will cause crashes
                        if (arr[0].children.includes(arr[1])) {
                            arr[0]._children.push(arr[1]);
                            arr[0].children.remove(arr[1]);
                        }
                    }
                )
                // repeat for all inserted nodes
                n.inserted_nodes.forEach(remove_inserted_root_nodes);
            };
            remove_inserted_root_nodes(d);

            // collapse neighbors which are visible and have been inserted by this node
            var vis_inserted_nei = d.neighbors.filter(n => n.visible&d.inserted_nodes.includes(n));

            vis_inserted_nei.forEach(
                n => {
                    // tag invisible
                    n.visible = false;
                    // if child, delete connection
                    if (d.children.includes(n)) {
                        d._children.push(n);
                        d.children.remove(n);
                    }
                    // if parent, delete connection
                    if (n.children.includes(d)) {
                        n._children.push(d);
                        n.children.remove(d);
                    }
                    // if union, collapse the union
                    if (n.data.isUnion) {
                        this.collapse(n);
                    }
                    // remove neighbor handle from clicked node
                    d.inserted_nodes.remove(n);
                }
            );
        },
        // uncollapse a node
        uncollapse(d, make_roots) {
            if (d == undefined) return;
            // neighbor nodes that are already visible (happens when
            // circles occur): make connections, save them to
            // destroy / rebuild on collapse
            var extended_neighbors = d.neighbors.filter(n => n.visible);
            extended_neighbors.forEach(
                n => {
                    // if child, make connection
                    if (d._children.includes(n)) {
                        d.inserted_connections.push([d, n]);
                    }
                    // if parent, make connection
                    if (n._children.includes(d)) {
                        d.inserted_connections.push([n, d]);
                    }
                }
            )
            // neighbor nodes that are invisible: make visible, make connections,
            // add root nodes, add to inserted_nodes
            var collapsed_neighbors = d.neighbors.filter(n => !n.visible);
            collapsed_neighbors.forEach(
                n => {
                    // collect neighbor data
                    n.neighbors = this.getNeighbors(n);
                    // tag visible
                    n.visible = true;
                    // if child, make connection
                    if (d._children.includes(n)) {
                        d.children.push(n);
                        d._children.remove(n);
                    }
                    // if parent, make connection
                    if (n._children.includes(d)) {
                        n.children.push(d);
                        n._children.remove(d);
                        // insert root nodes if flag is set
                        if (make_roots & !d.inserted_roots.includes(n)) {
                            d.inserted_roots.push(n);
                        }
                    }
                    // if union, uncollapse the union
                    if (n.data.isUnion) {
                        this.uncollapse(n, true);
                    }
                    // save neighbor handle in clicked node
                    d.inserted_nodes.push(n);
                }
            )

            // make sure this step is done only once
            if (!make_roots) {
                var add_root_nodes = n => {
                    // add previously inserted root nodes (partners, parents)
                    n.inserted_roots.forEach(p => this.dag.children.push(p));
                    // add previously inserted connections (circles)
                    n.inserted_connections.forEach(
                        arr => {
                            // check existence to prevent double entries
                            // which will cause crashes
                            if (arr[0]._children.includes(arr[1])) {
                                arr[0].children.push(arr[1]);
                                arr[0]._children.remove(arr[1]);
                            }
                        }
                    )
                    // repeat with all inserted nodes
                    n.inserted_nodes.forEach(add_root_nodes)
                };
                add_root_nodes(d);
            }
        },
        getNeighbors(node) {
            if (node.data.isUnion) {
                return this.getChildren(node)
                    .concat(this.getPartners(node))
            }
            else {
                return this.getOwnUnions(node)
                    .concat(this.getParentUnions(node))
            }
        },
        getParentUnions(node) {
            if (node == undefined) return [];
            if (node.data.isUnion) return [];
            var u_id = node.data.parent_union;
            if (u_id) {
                var union = this.all_nodes.find(n => n.id == u_id);
                return [union].filter(u => u != undefined);
            }
            else return [];
        },
        getParents(node) {
            var parents = [];
            if (node.data.isUnion) {
                node.data.partner.forEach(
                    p_id => parents.push(this.all_nodes.find(n => n.id == p_id))
                );
            }
            else {
                var parent_unions = getParentUnions(node);
                parent_unions.forEach(
                    u => parents = parents.concat(getParents(u))
                );
            }
            return parents.filter(p => p != undefined)
        },
        getOtherPartner(node, union_data) {
            var partner_id = union_data.partner.find(
                p_id => p_id != node.id & p_id != undefined
            );
            return this.all_nodes.find(n => n.id == partner_id)
        },
        getPartners(node) {
            var partners = [];
            // return both partners if node argument is a union
            if (node.data.isUnion) {
                node.data.partner.forEach(
                    p_id => partners.push(this.all_nodes.find(n => n.id == p_id))
                )
            }
            // return other partner of all unions if node argument is a person
            else {
                var own_unions = getOwnUnions(node);
                own_unions.forEach(
                    u => {
                        partners.push(getOtherPartner(node, u.data))
                    }
                )
            }
            return partners.filter(p => p != undefined)
        },
        getOwnUnions(node) {
            if (node.data.isUnion) return [];
            let unions = [];
            node.data.own_unions.forEach(
                u_id => unions.push(this.all_nodes.find(n => n.id == u_id))
            );
            return unions.filter(u => u != undefined)
        },
        getChildren(node) {
            var children = [];
            if (node.data.isUnion) {
                children = node.children.concat(node._children);
            }
            else {
                own_unions = getOwnUnions(node);
                own_unions.forEach(
                    u => children = children.concat(getChildren(u))
                )
            }
            // sort children by birth year, filter undefined
            children = children
                .filter(c => c != undefined)
                .sort((a, b) =>
                Math.sign((this.getBirthYear(a) || 0) - (this.getBirthYear(b) || 0)));
            return children
        },
        getBirthYear(node) {
            return new Date(node.data.birthday || NaN).getFullYear()
        },
        getDeathYear(node) {
            return new Date(node.data.deathyear || NaN).getFullYear()
        },
        find_path(n) {
            var parents = getParents(n);
            var found = false;
            var result = null;
            parents.forEach(
                p => {
                    if (p && !found) {
                        if (p.id == "profile-89285291") {
                            found = true;
                            result = [p, n];
                        }
                        else {
                            result = find_path(p);
                            if (result) {
                                found = true;
                                result.push(n)
                            }
                        }
                    }
                }
            )
            return result
        },
        update(source) {
            // Assigns the x and y position for the nodes
            var dag_tree = this.tree(this.dag),
                nodes = this.dag.descendants(),
                links = this.dag.links();
            // ****************** Nodes section ***************************
            // Update the nodes...
            var node = this.g.selectAll('g.node')
                .data(nodes, function (d) { return d.id || (d.id = ++i); })
            // Enter any new nodes at the parent's previous position.
            var nodeEnter = node.enter().append('g')
                .attr('class', 'node')
                .attr("transform", function (d) {
                    return "translate(" + source.y0 + "," + source.x0 + ")";
                })
                .on('click', this.click)
                // .on('mouseover', tip.show)
                // .on('mouseout', tip.hide)
                .attr('visible', true);
            // Add Circle for the nodes
            nodeEnter.append('circle')
                .attr('class', 'node')
                .attr('r', 1e-6)
                .style("fill", function (d) {
                    return d.neighbors.filter(n => !n.visible).length > 0 ? "lightsteelblue":"#fff";
                });

            // Add names as node labels
            nodeEnter.append('text')
                .attr("dy", "-2")
                .attr("x", 13)
                .attr("text-anchor", "start")
                .text(d => d.data.name);
            // add birth date and death date as labels
            nodeEnter.append('text')
                .attr("dy", "10")
                .attr("x", 13)
                .attr("text-anchor", "start")
                .text(
                    function (d) {
                        if (d.data.isUnion) return;
                        return (new Date(d.data.created_at).getFullYear()||"?")
                    }
                );

            // UPDATE
            var nodeUpdate = nodeEnter.merge(node);

            // Transition to the proper position for the node
            nodeUpdate.transition()
                .duration(this.duration)
                .attr("transform", function (d) {
                    return "translate(" + d.y + "," + d.x + ")";
                });

            // Update the node attributes and style
            nodeUpdate.select('circle.node')
                .attr('r', d => 10 * !d.data.isUnion + 0 * d.data.isUnion)
                .style("fill", function (d) {
                    return d.neighbors.filter(n => !n.visible).length > 0 ? "lightsteelblue":"#fff";
                })
                .attr('cursor', 'pointer');

            // Remove any exiting nodes
            var nodeExit = node.exit().transition()
                .duration(this.duration)
                .attr("transform", function (d) {
                    return "translate(" + source.y + "," + source.x + ")";
                })
                .attr('visible', false)
                .remove();

            // On exit reduce the node circles size to 0
            nodeExit.select('circle')
                .attr('r', 1e-6);

            // On exit reduce the opacity of text labels
            nodeExit.select('text')
                .style('fill-opacity', 1e-6);

            // ****************** links section ***************************

            // Update the links...
            var link = this.g.selectAll('path.link')
                .data(links, function (d) { return d.source.id + d.target.id });
            // Enter any new links at the parent's previous position.
            var linkEnter = link.enter().insert('path', "g")
                .attr("class", "link")
                .attr('d', d => {
                    let _this = this;
                    var o = { x: source.x0, y: source.y0 }
                    return _this.diagonal(o, o, 3)
                });

            // UPDATE
            var linkUpdate = linkEnter.merge(link);

            // Transition back to the parent element position
            linkUpdate.transition()
                .duration(this.duration)
                .attr('d', d => {let _this = this; return _this.diagonal(d.source, d.target, 2);});

            // Remove any exiting links
            var linkExit = link.exit().transition()
                .duration(this.duration)
                .attr('d', d => {
                    let _this = this;
                    var o = { x: source.x, y: source.y }
                    return _this.diagonal(o, o, 1)
                })
                .remove();

            // expanding a big subgraph moves the entire dag out of the window
            // to prevent this, cancel any transformations in y-direction
            this.svg.transition()
                .duration(this.duration)
                .call(
                    this.zoom.transform,
                    d3.zoomTransform(this.g.node()).translate(-(source.y - source.y0),
                    -(source.x - source.x0)),
                );

            // Store the old positions for transition.
            nodes.forEach(function (d) {
                d.x0 = d.x;
                d.y0 = d.y;
            });
        },
        diagonal(s, d, id) {
            const path = `M ${s.y} ${s.x}C ${(s.y + d.y) / 2} ${s.x},
            ${(s.y + d.y) / 2} ${d.x},${d.y} ${d.x}`;
            return path
        },
        // Toggle unions, children, partners on click.
        click(d) {

            // do nothing if node is union
            if (d.data.isUnion) return;

            // uncollapse if there are uncollapsed unions / children / partners
            if (this.is_extendable(d)) this.uncollapse(d)
            // collapse if fully uncollapsed
            else this.collapse(d)

            this.update(d);
        },
        generateTree() {
            for (let k in this.data.unions) {
                this.data.unions[k].isUnion = true
            }

            // mark persons
            for (let k in this.data.persons) {
                this.data.persons[k].isUnion = false
            }

            // Set the dimensions and margins of the diagram
            let screen_width = document.body.offsetWidth,
            // screen_height = document.documentElement.clientHeight;
            screen_height = document.getElementById('panel').clientHeight;

            // initialize panning, zooming
            this.zoom = d3.zoom()
                .on("zoom", _ => this.g.attr("transform", d3.event.transform));
            // initialize tooltips
            // let tip = d3.tip()
            //     .attr('class', 'd3-tip')
            //     .direction('e')
            //     .offset([0, 5])
            //     .html(
            //         function (d) {
            //             if (d.data.isUnion) return;
            //             var content = `
            //             <span style='margin-left: 2.5px;'><b>` + d.data.name + `</b></span><br>
            //             <table style="margin-top: 2.5px;">
            //                     <tr><td>born</td><td>` + (d.data.birthyear||"?")
            //                      + ` in ` + (d.data.birthplace||"?") + `</td></tr>
            //                     <tr><td>died</td><td>` + (d.data.deathyear||"?")
            //                      + ` in ` + (d.data.deathplace||"?") + `</td></tr>
            //             </table>
            //             `
            //             return content.replace(new RegExp("null", "g"), "?")
            //         }
            //     );

            // append the svg object to the body of the page
            // assigns width and height
            // activates zoom/pan and tooltips
            this.svg = d3.select("#panel").append("svg")
                .attr("width", screen_width)
                .attr("height", screen_height)
                .call(this.zoom);
                // .call(tip)
            // append group element
            this.g = this.svg.append("g");
            // helper variables
            var i = 0,
                x_sep = 120,
                y_sep = 50;
            this.duration = 750;
            // declare a dag layout
            this.tree = _dag.sugiyama()
                .nodeSize([y_sep, x_sep])
                .layering(_dag.layeringSimplex())
                .decross(_dag.decrossOpt)
                .coord(_dag.coordVert())
                .separation(
                    (a, b) => { return 1 }
                );
            // make dag from edge list
            const _links = this.data.links;
            let links = [];
            _links.forEach(
                item => links.push([item[0], item[1]])
            );
            this.dag = _dag.dagConnect()(this.data.links);

            // in order to make the family tree work, the dag
            // must be a node with id undefined. create that node if
            // not done automaticaly
            let root = null;
            if(this.dag.id !=undefined){
                root = this.dag.copy();
                root.id = undefined;
                root.children = [this.dag];
                this.dag = root;
            }

            // prepare node data
            this.all_nodes = this.dag.descendants()
            this.all_nodes.forEach(n => {
                n.data = this.data.persons[n.id] ? this.data.persons[n.id] : this.data.unions[n.id];
                n._children = n.children; // all nodes collapsed by default
                n.children = [];
                n.inserted_nodes = [];
                n.inserted_roots = [];
                n.neighbors = [];
                n.visible = false;
                n.inserted_connections = [];
            });

            // find root node and assign data
            root = this.all_nodes.find(n => n.id == this.data.start);

            if(root !== undefined) {
                root.visible = true;
                root.neighbors = this.getNeighbors(root);
                root.x0 = screen_height / 2;
                root.y0 = screen_width / 2;
                this.dag.children = [root];

                // draw dag
                this.update(root);
                setTimeout(this.expand, 1000);
                setTimeout(this.expand, 2000);
                setTimeout(this.expand, 3000);

            }
            // overwrite dag root nodes
        },
        expand(){
            this.all_nodes.forEach(n => {
                if(this.is_extendable(n)){
                    this.uncollapse(n);
                    this.update(n);
                };
            });
        },
        fecthData() {
            const start_id = this.$route.params.tree;
            // const fd = new FormData();
            // fd.append('start_id', start_id);
            // fd.append('nest', this.nest);
            const params = {
                'start_id': start_id,
                'nest':this.nest,
            };
            axios
                .get(this.fetchLink, { params })
                .then(res => {
                    this.data = (res['data']);
                    setTimeout(this.generateTree, 1000);
                    // this.generateTree();
                    })
                .catch(err => {  });
        }
    }
};
</script>

<style lang="scss">
</style>
