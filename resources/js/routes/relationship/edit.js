const RelationshipEdit = () => import('@pages/relationship/Edit.vue');

export default {
    name: 'relationship.edit',
    path: ':relationship/edit',
    component: RelationshipEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Relationship',
    },
};
