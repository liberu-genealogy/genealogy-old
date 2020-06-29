const PersonAssoCreate = () => import('../../pages/personasso/Create.vue');

export default {
    name: 'personasso.create',
    path: 'create',
    component: PersonAssoCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Person Asso',
    },
};
