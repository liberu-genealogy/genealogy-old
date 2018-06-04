const IndividualCreate = () => import('../../pages/individuals/Create.vue');

export default {
    name: 'individuals.create',
    path: 'create',
    component: IndividualCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Individuals',
    },
};
