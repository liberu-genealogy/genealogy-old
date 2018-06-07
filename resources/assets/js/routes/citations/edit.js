const CitationsEdit = () => import('../../pages/citations/Edit.vue');

export default {
    name: 'citations.edit',
    path: ':id/edit',
    component: CitationsEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Citation',
    },
};
