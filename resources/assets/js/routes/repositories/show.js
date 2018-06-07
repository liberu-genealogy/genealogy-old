const RepositoriesShow = () => import('../../pages/repositories/Show.vue');

export default {
    name: 'repositories.show',
    path: ':id',
    component: RepositoriesShow,
    meta: {
        breadcrumb: 'show',
        title: 'Repository information',
    },
};
