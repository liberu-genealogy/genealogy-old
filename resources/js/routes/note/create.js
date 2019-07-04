const noteCreate = () => import('@pages/note/Create.vue');

export default {
    name: 'note.create',
    path: 'create',
    component: noteCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Notes',
    },
};
