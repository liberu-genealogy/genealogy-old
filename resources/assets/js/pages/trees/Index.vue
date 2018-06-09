<template>
        <d3-network ref="net" :net-nodes="nodes" :net-links="links" :options="options" />
</template>

<script>

import d3Network from 'vue-d3-network';

export default {

    components: { d3Network },


    data() {
        return {
            nodes: [],
            links: [],
            nodeSize: 20,
            canvas: false,

        };
    },
    computed: {
        options() {
            return {
                force: 3000,
                size: { w: 1000, h: 1000 },
                nodeSize: this.nodeSize,
                nodeLabels: true,
                canvas: this.canvas,
                linkWidth: 2,
            };
        },
    },

    mounted() {
        axios.get(route('trees.index'))
            .then((response) => {
                this.nodes = response.data;
            }).catch(error => this.handleError(error)),

        axios.get(route('trees.links'))
            .then((response) => {
                this.links = response.data;
            }).catch(error => this.handleError(error));
    },

};
</script>

<style>
    .link {
        fill: none;
        stroke: #666;
        stroke-width: 1.5px;
    }
    circle {
        fill: #ccc;
        stroke: #333;
        stroke-width: 1.5px;
    }
    text {
        text-baseline:middle;
        text-anchor:middle;
        font: 10px sans-serif;
        /*pointer-events: none;*/
        text-shadow: 0 1px 0 #fff, 1px 0 0 #fff, 0 -1px 0 #fff, -1px 0 0 #fff;
    }

    .net-svg {
            width: 100%;
            height: 100%;
    }

</style>
