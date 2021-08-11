const PublicationCreate = () => import('../../pages/publications/Create.vue');

export default {
    name: 'publications.create',
    path: 'create',
    component: PublicationCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Publication',
    },
};
