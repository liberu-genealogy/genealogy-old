<template>
    <div id="tree">
        <tree class="tree" :identifier="getId" :node-text="text" :data="treeData" :duration=5 :margin-x=0 :margin-y=10></tree>
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
                        children: [{ id: 4, text: 'grandson' }, { id: 5, text: 'grandson2' }],
                    },
                    {
                        id: 3,
                        text: 'son2',
                        children: [{ id: 6, text: 'grandson3' }, { id: 7, text: 'grandson4' }],
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
