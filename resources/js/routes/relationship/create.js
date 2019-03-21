const RelationshipCreate = () => import('@pages/relationship/Create.vue');

export default {
    name: 'relationship.create',
    path: 'create',
    component: RelationshipCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Relationship',
    },
};
