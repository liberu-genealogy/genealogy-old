const NoteEdit = () => import('../../pages/notes/Edit.vue');

export default {
    name: 'notes.edit',
    path: ':note/edit',
    component: NoteEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Note',
    },
};
