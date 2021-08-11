const SourceRefEvenShow = () => import('../../pages/sourcerefevents/Show.vue');

export default {
    name: 'sourcerefevents.show',
    path: ':sourceRefEven',
    component: SourceRefEvenShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Source Ref Even',
    },
};
