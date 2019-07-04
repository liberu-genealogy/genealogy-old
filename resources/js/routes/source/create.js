const sourceCreate = () => import('@pages/source/Create.vue');

export default {
    name: 'source.create',
    path: 'create',
    component: sourceCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Sources',
    },
};
