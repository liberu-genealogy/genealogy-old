const SubmEdit = () => import('../../pages/subm/Edit.vue');

export default {
    name: 'subm.edit',
    path: ':subm/edit',
    component: SubmEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Subm',
    },
};
