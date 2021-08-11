const PersonAliaCreate = () => import('../../pages/personalias/Create.vue');

export default {
    name: 'personalias.create',
    path: 'create',
    component: PersonAliaCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Person Alia',
    },
};
