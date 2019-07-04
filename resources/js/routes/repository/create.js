const repositoryCreate = () => import('@pages/repository/Create.vue');

export default {
    name: 'repository.create',
    path: 'create',
    component: repositoryCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Repositories',
    },
};
