const NoteCreate = () => import('@pages/note/Create.vue');

export default {
    name: 'note.create',
    path: 'create',
    component: NoteCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Note',
    },
};
