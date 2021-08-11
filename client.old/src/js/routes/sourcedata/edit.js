const SourceDataEdit = () => import('../../pages/sourcedata/Edit.vue');

export default {
    name: 'sourcedata.edit',
    path: ':sourceData/edit',
    component: SourceDataEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Source Data',
    },
};
