const IndividualShow = () => import('@pages/individual/Show.vue');

export default {
    name: 'individual.show',
    path: ':individual',
    component: IndividualShow,
    meta: {
        breadcrumb: 'show',
        title: 'Individual Profile',
    },
};
