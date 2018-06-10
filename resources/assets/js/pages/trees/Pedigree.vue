<template>
<svg></svg>
</template>
<style>

    body {
        text-align: center;
    }

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

</style>
<script>
import VueD3 from 'vue-d3';

export default {
    components: {VueD3},
};
</script>
