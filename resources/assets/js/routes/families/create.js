const FamiliesCreate = () => import('../../pages/families/Create.vue');

export default {
    name: 'families.create',
    path: 'create',
    component: FamiliesCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Families',
    },
};
