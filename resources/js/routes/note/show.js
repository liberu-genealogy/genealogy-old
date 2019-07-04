const noteShow = () => import('@pages/note/Show.vue');

export default {
    name: 'note.show',
    path: ':note',
    component: noteShow,
    meta: {
        breadcrumb: 'show',
        title: 'Notes Profile',
    },
};
