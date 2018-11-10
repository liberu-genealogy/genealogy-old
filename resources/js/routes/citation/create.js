const CitationCreate = () => import('../../pages/citation/Create.vue');

export default {
    name: 'citation.create',
    path: 'create',
    component: CitationCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Citation',
    },
};
