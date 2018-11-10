const FamilyShow = () => import('../../pages/family/Show.vue');

export default {
    name: 'family.show',
    path: ':family',
    component: FamilyShow,
    meta: {
        breadcrumb: 'show',
        title: 'Family Profile',
    },
};
