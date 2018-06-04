const FamiliesEdit = () => import('../../pages/families/Edit.vue');

export default {
    name: 'families.edit',
    path: ':id/edit',
    component: FamiliesEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Family',
    },
};
