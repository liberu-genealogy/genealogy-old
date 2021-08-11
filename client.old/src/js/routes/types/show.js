const TypeShow = () => import('../../pages/types/Show.vue');

export default {
    name: 'types.show',
    path: ':type',
    component: TypeShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Type',
    },
};
