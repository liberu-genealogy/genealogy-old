const NoteShow = () => import('../../pages/note/Show.vue');

export default {
    name: 'note.show',
    path: ':note',
    component: NoteShow,
    meta: {
        breadcrumb: 'show',
        title: 'Note Profile',
    },
};
