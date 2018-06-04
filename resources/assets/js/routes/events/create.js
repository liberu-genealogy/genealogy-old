const UserCreate = () => import('../../pages/events/Create.vue');

export default {
    name: 'administration.users.create',
    path: 'create',
    component: UserCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create User',
    },
};
