const CitationsEdit = () => import('@pages/citations/Edit.vue');

export default {
    name: 'citations.edit',
    path: ':citations/edit',
    component: CitationsEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Citations',
    },
};
