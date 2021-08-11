const ChanEdit = () => import('../../pages/chan/Edit.vue');

export default {
    name: 'chan.edit',
    path: ':chan/edit',
    component: ChanEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Chan',
    },
};
