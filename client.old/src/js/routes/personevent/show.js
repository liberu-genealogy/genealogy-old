const PersonEventShow = () => import('../../pages/personevent/Show.vue');

export default {
    name: 'personevent.show',
    path: ':personEvent',
    component: PersonEventShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Person Event',
    },
};
