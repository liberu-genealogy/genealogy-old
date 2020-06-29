const FamilySlgsEdit = () => import('../../pages/familyslugs/Edit.vue');

export default {
    name: 'familyslugs.edit',
    path: ':familySlgs/edit',
    component: FamilySlgsEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Family Slgs',
    },
};
