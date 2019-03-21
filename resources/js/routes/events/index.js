const EventIndex = () => import('@pages/events/Index.vue');

export default {
    name: 'events.index',
    path: '',
    component: EventIndex,
    meta: {
        breadcrumb: 'index',
        title: 'Event',
    },
};
