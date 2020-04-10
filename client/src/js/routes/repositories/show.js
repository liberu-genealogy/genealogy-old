const RepositoryShow = () => import('../../pages/repositories/Show.vue');

export default {
    name: 'repositories.show',
    path: ':repository',
    component: RepositoryShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Repository',
    },
};
