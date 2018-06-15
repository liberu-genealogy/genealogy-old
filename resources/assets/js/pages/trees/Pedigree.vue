<template>
    <div id="graph"/>
</template>
<style>
#graph svg {
    margin-top: 32px;
    border: 1px solid #aaa;
}

.person rect {
    fill: #fff;
    stroke: steelblue;
    stroke-width: 1px;
}

.person {
    font: 14px sans-serif;
    cursor: pointer;
}

.link {
    fill: none;
    stroke: #ccc;
    stroke-width: 1.5px;
}

.linage {
    fill: none;
    stroke: black;
}
.marriage {
    fill: none;
    stroke: black;
}
.node {
    background-color: lightblue;
    border-style: solid;
    border-width: 1px;
}
.nodeText {
    font: 10px sans-serif;
}
</style>
<script>
import * as d3 from 'd3-dtree/node_modules/d3';
import dTree from 'd3-dtree';
import lodash from 'lodash';

window.d3 = d3;

export default {
    components: {
        dTree,
        lodash,
    },

    options: {
        target: '#graph',
        debug: true,
    },

    mounted() {
        this.data = [
            {
                name: 'Father', // The name of the node
                class: 'node', // The CSS class of the node
                textClass: 'nodeText', // The CSS class of the text in the node
                depthOffset: 1, // Generational height offset
                marriages: [
                    {
                        // Marriages is a list of nodes
                        spouse: {
                            // Each marriage has one spouse
                            name: 'Mother',
                        },
                        children: [
                            {
                                // List of children nodes
                                name: 'Child',
                            },
                        ],
                    },
                ],
                extra: {}, // Custom data passed to renderers
            },
        ];

        dTree.init(this.data, this.options);

        /*
        axios
            .get(route('trees.pedigree'))
            .then((response) => {
                this.data = response.data;
            })
            .catch(error => this.handleError(error));
        */
    },
};
</script>
