const PublicationIndex = () => import('../../pages/publications/Index.vue');

export default {
    name: 'publications.index',
    path: '',
    component: PublicationIndex,
    meta: {
        breadcrumb: 'index',
        title: 'Publications',
    },
};
