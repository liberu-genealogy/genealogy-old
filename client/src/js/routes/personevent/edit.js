const PersonEventEdit = () => import('../../pages/personevent/Edit.vue');

export default {
    name: 'personevent.edit',
    path: ':personEvent/edit',
    component: PersonEventEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Person Event',
    },
};
