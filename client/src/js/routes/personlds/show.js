const PersonLdsShow = () => import('../../pages/personlds/Show.vue');

export default {
    name: 'personlds.show',
    path: ':personLds',
    component: PersonLdsShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Person Lds',
    },
};
