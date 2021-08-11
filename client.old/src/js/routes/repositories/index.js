const RepositoryIndex = () => import('../../pages/repositories/Index.vue');

export default {
    name: 'repositories.index',
    path: '',
    component: RepositoryIndex,
    meta: {
        breadcrumb: 'index',
        title: 'Repositories',
    },
};
