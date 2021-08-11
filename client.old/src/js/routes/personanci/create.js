const PersonAnciCreate = () => import('../../pages/personanci/Create.vue');

export default {
    name: 'personanci.create',
    path: 'create',
    component: PersonAnciCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Person Anci',
    },
};
