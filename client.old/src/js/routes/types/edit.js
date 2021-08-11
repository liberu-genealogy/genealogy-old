const TypeEdit = () => import('../../pages/types/Edit.vue');

export default {
    name: 'types.edit',
    path: ':type/edit',
    component: TypeEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Type',
    },
};
