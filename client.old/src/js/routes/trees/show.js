const TreeShow = () => import('../../pages/trees/Show.vue');

export default {
    name: 'trees.show',
    path: ':tree/show',
    component: TreeShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Tree',
    },
};
