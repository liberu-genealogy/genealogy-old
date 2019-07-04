const CitationShow = () => import('@pages/citation/Show.vue');

export default {
    name: 'citation.show',
    path: ':citation',
    component: CitationShow,
    meta: {
        breadcrumb: 'show',
        title: 'Citations Profile',
    },
};
