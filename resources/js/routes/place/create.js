const PlaceCreate = () => import('@pages/place/Create.vue');

export default {
    name: 'place.create',
    path: 'create',
    component: PlaceCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Place',
    },
};
