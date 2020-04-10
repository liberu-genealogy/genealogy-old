const SourceCreate = () => import('../../pages/sources/Create.vue');

export default {
    name: 'sources.create',
    path: 'create',
    component: SourceCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Source',
    },
};
