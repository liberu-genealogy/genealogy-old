const NoteIndex = () => import('@pages/note/Index.vue');

export default {
    name: 'note.index',
    path: '',
    component: NoteIndex,
    meta: {
        breadcrumb: 'index',
        title: 'Note',
    },
};
