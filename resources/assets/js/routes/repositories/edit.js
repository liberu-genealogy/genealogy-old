const RepositoriesEdit = () => import('../../pages/repositories/Edit.vue');

export default {
    name: 'repositories.edit',
    path: ':id/edit',
    component: RepositoriesEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Repository',
    },
};
