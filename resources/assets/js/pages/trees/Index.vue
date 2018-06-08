<template>
    <div class="parent-div">
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

    .node { fill: #88c149;}

    .net-svg {
        position: fixed;
        z-index: 1;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        color: black;
        text-align: left;
    }

    #parentDiv {
        height: calc(100vh - 100px); /** output container is small for display */
        width: calc(100vw - 100px);
        display: block;
        border: 1px solid red;
    }

    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border-radius: 3px;
        border: 1px solid #888;
        width: 60%;
    }
</style>
