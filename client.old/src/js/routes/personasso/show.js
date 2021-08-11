const PersonAssoShow = () => import('../../pages/personasso/Show.vue');

export default {
    name: 'personasso.show',
    path: ':personAsso',
    component: PersonAssoShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Person Asso',
    },
};
