const SourcesEdit = () => import('../../pages/sources/Edit.vue');

export default {
    name: 'sources.edit',
    path: ':id/edit',
    component: SourcesEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Source',
    },
};
