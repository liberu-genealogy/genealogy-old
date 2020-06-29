const PersonAssoEdit = () => import('../../pages/personasso/Edit.vue');

export default {
    name: 'personasso.edit',
    path: ':personAsso/edit',
    component: PersonAssoEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Person Asso',
    },
};
