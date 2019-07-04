const noteIndex = () => import('@pages/note/Index.vue');

export default {
    name: 'note.index',
    path: '',
    component: noteIndex,
    meta: {
        breadcrumb: 'index',
        title: 'Notes',
    },
};
