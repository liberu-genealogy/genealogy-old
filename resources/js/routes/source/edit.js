const sourceEdit = () => import('@pages/source/Edit.vue');

export default {
    name: 'source.edit',
    path: ':source/edit',
    component: sourceEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Sources',
    },
};
