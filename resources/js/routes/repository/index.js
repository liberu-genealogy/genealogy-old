const RepositoryIndex = () => import('@pages/repository/Index.vue');

export default {
    name: 'repository.index',
    path: '',
    component: RepositoryIndex,
    meta: {
        breadcrumb: 'index',
        title: 'Repository',
    },
};
