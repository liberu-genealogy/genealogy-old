const DataImportIndex = () => import('../pages/gedcom/Index.vue');

export default {
    name: 'gedcom.index',
    path: '/gedcom',
    component: DataImportIndex,
    meta: {
        breadcrumb: 'gedcom import',
        title: 'Gedcom Import',
    },
};
