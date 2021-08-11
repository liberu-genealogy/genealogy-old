const PersonAliaEdit = () => import('../../pages/personalias/Edit.vue');

export default {
    name: 'personalias.edit',
    path: ':personAlia/edit',
    component: PersonAliaEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Person Alia',
    },
};
