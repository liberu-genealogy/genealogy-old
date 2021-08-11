const ObjectCreate = () => import('../../pages/objects/Create.vue');

export default {
    name: 'objects.create',
    path: 'create',
    component: ObjectCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Object',
    },
};
