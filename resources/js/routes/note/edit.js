const NoteEdit = () => import('@pages/note/Edit.vue');

export default {
    name: 'note.edit',
    path: ':note/edit',
    component: NoteEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Note',
    },
};
