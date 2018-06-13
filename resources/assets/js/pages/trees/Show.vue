<template>
    <div class="graph">
        <hierarchical-edge-bundling identifier="id" :data="tree" :links="links" :link-types="linkTypes" node-text="name" :margin-x=20 :margin-y=20>

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
                name: 'father',
                children: [
                    {
                        name: 'son1',
                        children: [{ name: 'grandson', id: 1 }, { name: 'grandson2', id: 2 }],
                    },
                    {
                        name: 'son2',
                        children: [{ name: 'grandson3', id: 3 }, { name: 'grandson4', id: 4 }],
                    },
                ],
            },
            links: [{ source: 3, target: 1, type: 1 }, { source: 3, target: 4, type: 2 }],
            linkTypes: [
                { id: 1, name: 'depends', symmetric: true },
                {
                    id: 2,
                    name: 'implement',
                    inName: 'implements',
                    outName: 'is implemented by',
                },
                {
                    id: 3,
                    name: 'uses',
                    inName: 'uses',
                    outName: 'is used by',
                },
            ],
        };
    },
};
</script>

<style scoped>
.graph .link {
    fill: none;
    stroke: blue;
    stroke-opacity: 0.2;
    stroke-width: 1.5px;
    transition: stroke 0.5s, stroke-opacity 0.5s;
}
.graph.detailed .link.link--source,
.graph.detailed .link.link--target {
    stroke-opacity: 1;
}
.graph.detailed .link {
    stroke-opacity: 0.01;
}
.graph .link.link--source {
    stroke: #d62728;
}
.graph .link.link--target {
    stroke: #2ca02c;
}
.graph .nodetree text {
    font: 10px sans-serif;
    transition: opacity 0.5s, fill 0.5s;
}
.graph.detailed .nodetree.node--source text {
    fill: #2ca02c;
}
.graph.detailed .nodetree.node--target text {
    fill: #d62728;
}
.graph.detailed .nodetree.node--selected text,
.graph.detailed .nodetree.node--source text,
.graph.detailed .nodetree.node--target text {
    font-weight: bold;
    opacity: 1;
}
.graph.detailed .nodetree text {
    opacity: 0.1;
}
</style>
