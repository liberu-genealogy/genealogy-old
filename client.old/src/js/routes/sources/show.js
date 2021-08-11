const SourceShow = () => import('../../pages/sources/Show.vue');

export default {
    name: 'sources.show',
    path: ':source',
    component: SourceShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Source',
    },
};
