const AddrEdit = () => import('../../pages/addresses/Edit.vue');

export default {
    name: 'addresses.edit',
    path: ':addr/edit',
    component: AddrEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Addr',
    },
};
