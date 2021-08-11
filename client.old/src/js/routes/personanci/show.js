const PersonAnciShow = () => import('../../pages/personanci/Show.vue');

export default {
    name: 'personanci.show',
    path: ':personAnci',
    component: PersonAnciShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Person Anci',
    },
};
