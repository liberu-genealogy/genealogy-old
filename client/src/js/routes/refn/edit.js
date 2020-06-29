const RefnEdit = () => import('../../pages/refn/Edit.vue');

export default {
    name: 'refn.edit',
    path: ':refn/edit',
    component: RefnEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Refn',
    },
};
