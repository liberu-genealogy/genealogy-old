const repositoryShow = () => import('@pages/repository/Show.vue');

export default {
    name: 'repository.show',
    path: ':repository',
    component: repositoryShow,
    meta: {
        breadcrumb: 'show',
        title: 'Repositories Profile',
    },
};
