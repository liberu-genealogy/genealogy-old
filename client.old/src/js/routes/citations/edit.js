const CitationEdit = () => import('../../pages/citations/Edit.vue');

export default {
    name: 'citations.edit',
    path: ':citation/edit',
    component: CitationEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Citation',
    },
};
