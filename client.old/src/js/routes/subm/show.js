const SubmShow = () => import('../../pages/subm/Show.vue');

export default {
    name: 'subm.show',
    path: ':subm',
    component: SubmShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Subm',
    },
};
