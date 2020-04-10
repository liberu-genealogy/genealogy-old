const NoteIndex = () => import('../../pages/notes/Index.vue');

export default {
    name: 'notes.index',
    path: '',
    component: NoteIndex,
    meta: {
        breadcrumb: 'index',
        title: 'Notes',
    },
};
