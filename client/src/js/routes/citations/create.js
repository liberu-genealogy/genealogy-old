const CitationCreate = () => import('../../pages/citations/Create.vue');

export default {
    name: 'citations.create',
    path: 'create',
    component: CitationCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Citation',
    },
};
