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

    data() {
        return {
            options: {
                target: '#graph',
                debug: true,
            },
        };
    },

    mounted() {
        axios
            .get(route('trees.pedigree', 36))
            .then(response => {
                this.data = response.data;
                dTree.init(this.data, this.options);
            })
            .catch(error => this.handleError(error));
    },
};
</script>
