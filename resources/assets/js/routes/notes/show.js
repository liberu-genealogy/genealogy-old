const NotesShow = () => import('../../pages/notes/Show.vue');

export default {
    name: 'notes.show',
    path: ':id',
    component: NotesShow,
    meta: {
        breadcrumb: 'show',
        title: 'Note information',
    },
};
