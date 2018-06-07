const NotesCreate = () => import('../../pages/notes/Create.vue');

export default {
    name: 'notes.create',
    path: 'create',
    component: NotesCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Notes',
    },
};
