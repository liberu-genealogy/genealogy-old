const AuthorShow = () => import('../../pages/authors/Show.vue');

export default {
    name: 'authors.show',
    path: ':author',
    component: AuthorShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Author',
    },
};
