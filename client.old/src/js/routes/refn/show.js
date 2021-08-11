const RefnShow = () => import('../../pages/refn/Show.vue');

export default {
    name: 'refn.show',
    path: ':refn',
    component: RefnShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Refn',
    },
};
