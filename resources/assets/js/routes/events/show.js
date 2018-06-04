const UserShow = () => import('../../pages/events/Show.vue');

export default {
    name: 'administration.users.show',
    path: ':id',
    component: UserShow,
    meta: {
        breadcrumb: 'show',
        title: 'User Profile',
    },
};
