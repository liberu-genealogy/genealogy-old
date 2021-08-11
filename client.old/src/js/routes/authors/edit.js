const AuthorEdit = () => import('../../pages/authors/Edit.vue');

export default {
    name: 'authors.edit',
    path: ':author/edit',
    component: AuthorEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Author',
    },
};
