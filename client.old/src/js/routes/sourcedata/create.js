const SourceDataCreate = () => import('../../pages/sourcedata/Create.vue');

export default {
    name: 'sourcedata.create',
    path: 'create',
    component: SourceDataCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Source Data',
    },
};
