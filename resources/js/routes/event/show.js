const EventShow = () => import('../../pages/event/Show.vue');

export default {
    name: 'event.show',
    path: ':event',
    component: EventShow,
    meta: {
        breadcrumb: 'show',
        title: 'Event Profile',
    },
};
