const RelationshipShow = () => import('@pages/relationship/Show.vue');

export default {
    name: 'relationship.show',
    path: ':relationship',
    component: RelationshipShow,
    meta: {
        breadcrumb: 'show',
        title: 'Relationship Profile',
    },
};
