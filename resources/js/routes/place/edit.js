const PlaceEdit = () => import('../../pages/place/Edit.vue');

export default {
    name: 'place.edit',
    path: ':place/edit',
    component: PlaceEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Place',
    },
};
