const AddrShow = () => import('../../pages/addresses/Show.vue');

export default {
    name: 'addresses.show',
    path: ':addr',
    component: AddrShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Addr',
    },
};
