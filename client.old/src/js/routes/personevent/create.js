const PersonEventCreate = () => import('../../pages/personevent/Create.vue');

export default {
    name: 'personevent.create',
    path: 'create',
    component: PersonEventCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Person Event',
    },
};
