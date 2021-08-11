const PersonLdsEdit = () => import('../../pages/personlds/Edit.vue');

export default {
    name: 'personlds.edit',
    path: ':personLds/edit',
    component: PersonLdsEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Person Lds',
    },
};
