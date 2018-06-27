<template>
    <div id="tree">
        <tree class="tree" :identifier="getId" :node-text="text" :data="treeData" :duration="5" :margin-x="0" :margin-y="10"/>
    </div>
</template>

<script>
import { tree } from 'vued3tree';

export default {
    components: {
        tree,
    },
    data() {
        return {
            text: 'text',
            treeData: [],
        };
    },

    mounted() {
        axios
            .get(route('trees.show', { parent_id: 1, nest: 15 })) // provide 1 parameter for the parent
            .then((response) => {
                this.treeData = response.data[0];
            })
            .catch(error => this.handleError(error));
    },
    methods: {
        getId(node) {
            return node.id;
        },
    },

};
</script>
<style>
#tree {
    width: 100%;
    max-height: 600px;
    height: 600px;
}

#tree svg {
    margin-top: 32px;
    border: 1px solid #aaa;
    max-height: 600px;
}
</style>
