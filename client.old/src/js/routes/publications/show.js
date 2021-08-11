const PublicationShow = () => import('../../pages/publications/Show.vue');

export default {
    name: 'publications.show',
    path: ':publication',
    component: PublicationShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Publication',
    },
};
