const TypeCreate = () => import('../../pages/types/Create.vue');

export default {
    name: 'types.create',
    path: 'create',
    component: TypeCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Type',
    },
};
