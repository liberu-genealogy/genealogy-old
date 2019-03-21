const CitationsCreate = () => import('@pages/citations/Create.vue');

export default {
    name: 'citations.create',
    path: 'create',
    component: CitationsCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Citations',
    },
};
