const ProfileShow = () => import('../../pages/profile/Show.vue');

export default {
    name: 'profile.show',
    path: '/profile',
    component: ProfileShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Profile',
    },
};
