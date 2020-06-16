const ObjectShow = () => import('../../pages/objects/Show.vue');

export default {
    name: 'objects.show',
    path: ':object',
    component: ObjectShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Object',
    },
};
