const FamilyShow = () => import('../../pages/families/Show.vue');

export default {
    name: 'families.show',
    path: ':family',
    component: FamilyShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Family',
    },
};
