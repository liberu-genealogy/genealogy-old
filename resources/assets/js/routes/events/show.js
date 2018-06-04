const EventsShow = () => import('../../pages/events/Show.vue');

export default {
    name: 'events.show',
    path: ':id',
    component: EventsShow,
    meta: {
        breadcrumb: 'show',
        title: 'Event Profile',
    },
};
