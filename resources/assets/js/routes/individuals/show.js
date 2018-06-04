const IndividualsShow = () => import('../../pages/individuals/Show.vue');

export default {
    name: 'individuals.show',
    path: ':id',
    component: IndividualsShow,
    meta: {
        breadcrumb: 'show',
        title: 'Individual Profile',
    },
};
