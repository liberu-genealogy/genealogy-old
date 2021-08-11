const PersonAliaShow = () => import('../../pages/personalias/Show.vue');

export default {
    name: 'personalias.show',
    path: ':personAlia',
    component: PersonAliaShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Person Alia',
    },
};
