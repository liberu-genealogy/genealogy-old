<template>
    <div class="container">
        <tree class="tree" :identifier="getId" :node-text="text" :data="treeData" :type="'tree'" :duration="5" :margin-y="150"> </tree>
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
            treeData: {
                id: 1,
                text: 'father',
                children: [
                    {
                        id: 2,
                        text: 'son1',
                        children: [
                            { id: 4, text: 'grandson' },
                            { id: 5, text: 'grandson2' },
                        ],
                    },
                    {
                        id: 3,
                        text: 'son2',
                        children: [
                            { id: 6, name: 'grandson3' },
                            { id: 7, text: 'grandson4' },
                        ],
                    },
                ],
            },
        };
    },
    methods: {
        getId(node) {
            return node.id;
        },
    },
};
</script>

<style scoped>
    .tree {
        height: 600px;
        width: 1000px;
    }
</style>
