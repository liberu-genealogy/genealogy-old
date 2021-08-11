const FamilyEdit = () => import('../../pages/families/Edit.vue');

export default {
    name: 'families.edit',
    path: ':family/edit',
    component: FamilyEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Family',
    },
};
