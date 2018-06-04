const EventsCreate = () => import('../../pages/events/Create.vue');

export default {
    name: 'events.create',
    path: 'create',
    component: EventsCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Event',
    },
};
