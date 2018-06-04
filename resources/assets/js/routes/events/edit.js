const UserEdit = () => import('../../pages/events/Edit.vue');

export default {
    name: 'administration.users.edit',
    path: ':id/edit',
    component: UserEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit User',
    },
};
