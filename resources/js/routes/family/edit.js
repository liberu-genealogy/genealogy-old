const FamilyEdit = () => import('@pages/family/Edit.vue');

export default {
    name: 'family.edit',
    path: ':family/edit',
    component: FamilyEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Family',
    },
};
