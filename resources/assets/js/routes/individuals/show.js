const IndividualShow = () => import('../../pages/individuals/Show.vue');

export default {
    name: 'individuals.show',
    path: ':id',
    component: IndividualShow,
    meta: {
        breadcrumb: 'show',
        title: 'Individual Profile',
    },
};
