const IndividualCreate = () => import('../../pages/individual/Create.vue');

export default {
    name: 'individual.create',
    path: 'create',
    component: IndividualCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Individual',
    },
};
