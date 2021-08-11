const RepositoryEdit = () => import('../../pages/repositories/Edit.vue');

export default {
    name: 'repositories.edit',
    path: ':repository/edit',
    component: RepositoryEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Repository',
    },
};
