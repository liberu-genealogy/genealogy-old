const SourcesCreate = () => import('../../pages/sources/Create.vue');

export default {
    name: 'sources.create',
    path: 'create',
    component: SourcesCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Sources',
    },
};
