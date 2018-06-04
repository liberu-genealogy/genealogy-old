const FamiliesEdit = () => import('../../pages/families/Edit.vue');

export default {
    name: 'administration.owners.edit',
    path: ':id/edit',
    component: FamiliesEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Owner',
    },
};
