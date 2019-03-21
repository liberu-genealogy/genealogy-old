const EventEdit = () => import('@pages/events/Edit.vue');

export default {
    name: 'events.edit',
    path: ':event/edit',
    component: EventEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Event',
    },
};
