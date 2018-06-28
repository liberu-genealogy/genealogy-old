<template>
    <div id="graph">
        <hierarchical-edge-bundling identifier="id" zoomable="true" :data="tree" :links="links" node-text="name" :margin-x="20" :margin-y="20" layoutType="circular" type="cluster">

        </hierarchical-edge-bundling>
    </div>
</template>

<script>
import { hierarchicalEdgeBundling } from 'vued3tree';

export default {
    components: {
        hierarchicalEdgeBundling,
    },
    data() {
        return {
            tree: {
                name: "father",
                children:[]
            },
            links: [],

        };
    },

    mounted() {
        axios
            .get(route('trees.edge', {'parent_id':7,'nest':3}))
            .then(response => {
                let data = response.data;
                this.tree = data.tree[0];
                this.links = data.links;
            })
            .catch(error => this.handleError(error));
    },
};
</script>

<style>
#graph svg {
    height: 600px;
    width: 100%;
}
</style>
