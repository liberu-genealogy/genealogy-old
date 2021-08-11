const NoteCreate = () => import('../../pages/notes/Create.vue');

export default {
    name: 'notes.create',
    path: 'create',
    component: NoteCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Note',
    },
};
