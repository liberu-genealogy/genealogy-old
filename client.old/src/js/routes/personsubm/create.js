const PersonSubmCreate = () => import('../../pages/personsubm/Create.vue');

export default {
    name: 'personsubm.create',
    path: 'create',
    component: PersonSubmCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Person Subm',
    },
};
