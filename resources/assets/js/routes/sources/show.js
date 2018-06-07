const SourcesShow = () => import('../../pages/sources/Show.vue');

export default {
    name: 'sources.show',
    path: ':id',
    component: SourcesShow,
    meta: {
        breadcrumb: 'show',
        title: 'Source information',
    },
};
