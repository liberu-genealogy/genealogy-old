const EventsShow = () => import('../../pages/events/Show.vue');

export default {
    name: 'event.show',
    path: ':id',
    component: EventShow,
    meta: {
        breadcrumb: 'show',
        title: 'Event Profile',
    },
};
