const EventShow = () => import('@pages/events/Show.vue');

export default {
    name: 'events.show',
    path: ':event',
    component: EventShow,
    meta: {
        breadcrumb: 'show',
        title: 'Event Profile',
    },
};
