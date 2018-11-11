const SourceEdit = () => import('../../pages/source/Edit.vue');

export default {
    name: 'source.edit',
    path: ':source/edit',
    component: SourceEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Source',
    },
};
