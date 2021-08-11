const FamilySlgsShow = () => import('../../pages/familyslugs/Show.vue');

export default {
    name: 'familyslugs.show',
    path: ':familySlgs',
    component: FamilySlgsShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Family Slgs',
    },
};
