const SourceDataEvenShow = () => import('../../pages/sourcedataevent/Show.vue');

export default {
    name: 'sourcedataevent.show',
    path: ':sourceDataEven',
    component: SourceDataEvenShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Source Data Even',
    },
};
