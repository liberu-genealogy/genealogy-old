const ChanShow = () => import('../../pages/chan/Show.vue');

export default {
    name: 'chan.show',
    path: ':chan',
    component: ChanShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Chan',
    },
};
