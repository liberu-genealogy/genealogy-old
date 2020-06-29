const FamilyEventShow = () => import('../../pages/familyevents/Show.vue');

export default {
    name: 'familyevents.show',
    path: ':familyEvent',
    component: FamilyEventShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Family Event',
    },
};
