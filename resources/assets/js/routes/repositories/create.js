const RepositoriesCreate = () => import('../../pages/repositories/Create.vue');

export default {
    name: 'repositories.create',
    path: 'create',
    component: RepositoriesCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Repositories',
    },
};
