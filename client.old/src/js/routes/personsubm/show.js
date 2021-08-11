const PersonSubmShow = () => import('../../pages/personsubm/Show.vue');

export default {
    name: 'personsubm.show',
    path: ':personSubm',
    component: PersonSubmShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Person Subm',
    },
};
