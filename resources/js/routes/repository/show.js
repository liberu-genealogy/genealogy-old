const RepositoryShow = () => import('@pages/repository/Show.vue');

export default {
    name: 'repository.show',
    path: ':repository',
    component: RepositoryShow,
    meta: {
        breadcrumb: 'show',
        title: 'Repository Profile',
    },
};
