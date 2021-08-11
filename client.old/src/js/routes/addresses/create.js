const AddrCreate = () => import('../../pages/addresses/Create.vue');

export default {
    name: 'addresses.create',
    path: 'create',
    component: AddrCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Addr',
    },
};
