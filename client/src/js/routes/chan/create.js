const ChanCreate = () => import('../../pages/chan/Create.vue');

export default {
    name: 'chan.create',
    path: 'create',
    component: ChanCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Chan',
    },
};
