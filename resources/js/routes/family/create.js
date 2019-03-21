const FamilyCreate = () => import('@pages/family/Create.vue');

export default {
    name: 'family.create',
    path: 'create',
    component: FamilyCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Family',
    },
};
