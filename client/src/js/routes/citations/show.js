const CitationShow = () => import('../../pages/citations/Show.vue');

export default {
    name: 'citations.show',
    path: ':citation',
    component: CitationShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Citation',
    },
};
