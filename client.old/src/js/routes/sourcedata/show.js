const SourceDataShow = () => import('../../pages/sourcedata/Show.vue');

export default {
    name: 'sourcedata.show',
    path: ':sourceData',
    component: SourceDataShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Source Data',
    },
};
