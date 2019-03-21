const CitationsShow = () => import('@pages/citations/Show.vue');

export default {
    name: 'citations.show',
    path: ':citations',
    component: CitationsShow,
    meta: {
        breadcrumb: 'show',
        title: 'Citations Profile',
    },
};
