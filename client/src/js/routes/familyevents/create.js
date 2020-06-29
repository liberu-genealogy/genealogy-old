const FamilyEventCreate = () => import('../../pages/familyevents/Create.vue');

export default {
    name: 'familyevents.create',
    path: 'create',
    component: FamilyEventCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Family Event',
    },
};
