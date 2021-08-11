const PlaceShow = () => import('../../pages/places/Show.vue');

export default {
    name: 'places.show',
    path: ':place',
    component: PlaceShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Place',
    },
};
