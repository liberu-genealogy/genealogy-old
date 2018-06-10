<template/>
<style>

    svg {
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
    .nodeText{
        font: 10px sans-serif;
    }

</style>
<script>
import dTree from 'd3-dtree';
import lodash from 'lodash';
import vueD3 from 'vue-d3';

export default {
    components: {
        dTree, lodash, vueD3,
    },

    mounted() {
        axios.get(route('trees.index'))
            .then((response) => {
                this.data = response.data;
            }).catch(error => this.handleError(error)),

        axios.get(route('trees.links'))
            .then((response) => {
                this.links = response.data;
            }).catch(error => this.handleError(error));

        dTree.init(this.data, this.links);
    },

};

</script>
