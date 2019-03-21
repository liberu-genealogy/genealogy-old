const SourceCreate = () => import('@pages/source/Create.vue');

export default {
    name: 'source.create',
    path: 'create',
    component: SourceCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Source',
    },
};
