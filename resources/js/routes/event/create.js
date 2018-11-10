const EventCreate = () => import('../../pages/event/Create.vue');

export default {
    name: 'event.create',
    path: 'create',
    component: EventCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Event',
    },
};
