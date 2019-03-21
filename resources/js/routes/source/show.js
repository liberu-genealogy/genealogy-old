const SourceShow = () => import('@pages/source/Show.vue');

export default {
    name: 'source.show',
    path: ':source',
    component: SourceShow,
    meta: {
        breadcrumb: 'show',
        title: 'Source Profile',
    },
};
