const FamilyEventEdit = () => import('../../pages/familyevents/Edit.vue');

export default {
    name: 'familyevents.edit',
    path: ':familyEvent/edit',
    component: FamilyEventEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Family Event',
    },
};
