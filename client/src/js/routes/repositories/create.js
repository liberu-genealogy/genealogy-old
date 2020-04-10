const RepositoryCreate = () => import('../../pages/repositories/Create.vue');

export default {
    name: 'repositories.create',
    path: 'create',
    component: RepositoryCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Repository',
    },
};
