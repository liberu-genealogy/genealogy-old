const IndividualsEdit = () => import('../../pages/individuals/Edit.vue');

export default {
    name: 'individuals.edit',
    path: ':id/edit',
    component: IndividualsEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Individual',
    },
};
