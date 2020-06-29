const PersonSubmEdit = () => import('../../pages/personsubm/Edit.vue');

export default {
    name: 'personsubm.edit',
    path: ':personSubm/edit',
    component: PersonSubmEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Person Subm',
    },
};
