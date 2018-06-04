const FamiliesShow = () => import('../../pages/families/Show.vue');

export default {
    name: 'families.show',
    path: ':id',
    component: FamiliesShow,
    meta: {
        breadcrumb: 'show',
        title: 'Family information',
    },
};
