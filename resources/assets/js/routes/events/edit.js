const EventsEdit = () => import('../../pages/events/Edit.vue');

export default {
    name: 'events.edit',
    path: ':id/edit',
    component: EventsEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Event',
    },
};
