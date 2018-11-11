const IndividualEdit = () => import('../../pages/individual/Edit.vue');

export default {
    name: 'individual.edit',
    path: ':individual/edit',
    component: IndividualEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Individual',
    },
};
