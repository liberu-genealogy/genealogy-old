const RepositoriesIndex = () => import('../../pages/repositories/Index.vue');

export default {
    name: 'repositories.index',
    path: '',
    component: RepositoriesIndex,
    meta: {
        breadcrumb: 'index',
        title: 'Repositories Index',
    },
};
