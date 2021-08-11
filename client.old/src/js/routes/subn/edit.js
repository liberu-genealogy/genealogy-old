const SubnEdit = () => import('../../pages/subn/Edit.vue');

export default {
    name: 'subn.edit',
    path: ':subn/edit',
    component: SubnEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Subn',
    },
};
