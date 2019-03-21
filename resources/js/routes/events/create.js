const EventCreate = () => import('@pages/events/Create.vue');

export default {
    name: 'events.create',
    path: 'create',
    component: EventCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Event',
    },
};
