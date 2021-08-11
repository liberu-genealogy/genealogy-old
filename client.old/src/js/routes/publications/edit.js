const PublicationEdit = () => import('../../pages/publications/Edit.vue');

export default {
    name: 'publications.edit',
    path: ':publication/edit',
    component: PublicationEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Publication',
    },
};
