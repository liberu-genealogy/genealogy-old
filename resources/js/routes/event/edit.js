const EventEdit = () => import('../../pages/event/Edit.vue');

export default {
    name: 'event.edit',
    path: ':event/edit',
    component: EventEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Event',
    },
};
