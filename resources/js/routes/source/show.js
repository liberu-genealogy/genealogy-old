const sourceShow = () => import('@pages/source/Show.vue');

export default {
    name: 'source.show',
    path: ':source',
    component: sourceShow,
    meta: {
        breadcrumb: 'show',
        title: 'Sources Profile',
    },
};
