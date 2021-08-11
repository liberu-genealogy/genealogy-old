const ObjectEdit = () => import('../../pages/objects/Edit.vue');

export default {
    name: 'objects.edit',
    path: ':object/edit',
    component: ObjectEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Object',
    },
};
