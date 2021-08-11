const NoteShow = () => import('../../pages/notes/Show.vue');

export default {
    name: 'notes.show',
    path: ':note',
    component: NoteShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Note',
    },
};
