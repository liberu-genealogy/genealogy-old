const ProfileEdit = () => import('../../pages/profile/Edit.vue');

export default {
    name: 'profile.edit',
    path: 'profile/edit',
    component: ProfileEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Profile',
    },
};
