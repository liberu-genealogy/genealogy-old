const PlaceEdit = () => import('../../pages/places/Edit.vue');

export default {
    name: 'places.edit',
    path: ':place/edit',
    component: PlaceEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Place',
    },
};
