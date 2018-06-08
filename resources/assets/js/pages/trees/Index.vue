<template>
    <div class="svg-container">
    <d3-network ref="net" :net-nodes="nodes" :net-links="links" :options="options" />
    </div>
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
                size: { w: 600, h: 600 },
                nodeSize: this.nodeSize,
                nodeLabels: true,
                canvas: this.canvas,
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
    .link { stroke: #0b86f3; }

    .net-svg {
        width: 100%;
        height: 100%;
    }

    .svg-container {
        display: inline-block;
        position: relative;
        width: 100%;
        padding-bottom: 100%; /* aspect ratio */
        vertical-align: top;
        overflow: hidden;
    }
    .svg-content-responsive {
        display: inline-block;
        position: absolute;
        top: 10px;
        left: 0;
    }

    .node { fill: #88c149;}
</style>
