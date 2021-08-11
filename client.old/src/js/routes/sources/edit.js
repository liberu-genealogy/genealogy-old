const SourceEdit = () => import('../../pages/sources/Edit.vue');

export default {
    name: 'sources.edit',
    path: ':source/edit',
    component: SourceEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Source',
    },
};
