const PersonAnciEdit = () => import('../../pages/personanci/Edit.vue');

export default {
    name: 'personanci.edit',
    path: ':personAnci/edit',
    component: PersonAnciEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Person Anci',
    },
};
