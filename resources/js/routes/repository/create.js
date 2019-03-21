const RepositoryCreate = () => import('@pages/repository/Create.vue');

export default {
    name: 'repository.create',
    path: 'create',
    component: RepositoryCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Repository',
    },
};
