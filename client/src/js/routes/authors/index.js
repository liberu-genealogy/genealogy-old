const AuthorIndex = () => import('../../pages/authors/Index.vue');

export default {
    name: 'authors.index',
    path: '',
    component: AuthorIndex,
    meta: {
        breadcrumb: 'index',
        title: 'Authors',
    },
};
