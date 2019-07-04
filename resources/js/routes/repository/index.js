const repositoryIndex = () => import('@pages/repository/Index.vue');

export default {
    name: 'repository.index',
    path: '',
    component: repositoryIndex,
    meta: {
        breadcrumb: 'index',
        title: 'Repositories',
    },
};
