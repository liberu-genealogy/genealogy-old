const RepositoryEdit = () => import('../../pages/repository/Edit.vue');

export default {
    name: 'repository.edit',
    path: ':repository/edit',
    component: RepositoryEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Repository',
    },
};
