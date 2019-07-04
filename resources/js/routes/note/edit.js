const noteEdit = () => import('@pages/note/Edit.vue');

export default {
    name: 'note.edit',
    path: ':note/edit',
    component: noteEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Notes',
    },
};
