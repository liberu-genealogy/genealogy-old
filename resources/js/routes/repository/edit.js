const repositoryEdit = () => import('@pages/repository/Edit.vue');

export default {
    name: 'repository.edit',
    path: ':repository/edit',
    component: repositoryEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Repositories',
    },
};
