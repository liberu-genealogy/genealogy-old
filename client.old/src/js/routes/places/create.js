const PlaceCreate = () => import('../../pages/places/Create.vue');

export default {
    name: 'places.create',
    path: 'create',
    component: PlaceCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Place',
    },
};
