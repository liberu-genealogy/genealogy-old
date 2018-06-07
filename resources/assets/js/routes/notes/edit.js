const NotesEdit = () => import('../../pages/notes/Edit.vue');

export default {
    name: 'notes.edit',
    path: ':id/edit',
    component: NotesEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Note',
    },
};
