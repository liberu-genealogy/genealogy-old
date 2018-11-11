const PlaceShow = () => import('../../pages/place/Show.vue');

export default {
    name: 'place.show',
    path: ':place',
    component: PlaceShow,
    meta: {
        breadcrumb: 'show',
        title: 'Place Profile',
    },
};
