const CitationsShow = () => import('../../pages/citations/Show.vue');

export default {
    name: 'citations.show',
    path: ':id',
    component: CitationsShow,
    meta: {
        breadcrumb: 'show',
        title: 'Citation information',
    },
};
