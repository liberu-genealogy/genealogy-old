const FamilyCreate = () => import('../../pages/families/Create.vue');

export default {
    name: 'families.create',
    path: 'create',
    component: FamilyCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Family',
    },
};
