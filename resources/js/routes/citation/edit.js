const CitationEdit = () => import('@pages/citation/Edit.vue');

export default {
    name: 'citation.edit',
    path: ':citation/edit',
    component: CitationEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Citations',
    },
};
