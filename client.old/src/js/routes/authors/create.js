const AuthorCreate = () => import('../../pages/authors/Create.vue');

export default {
    name: 'authors.create',
    path: 'create',
    component: AuthorCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Author',
    },
};
