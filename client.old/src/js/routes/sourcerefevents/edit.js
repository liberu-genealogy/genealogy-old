const SourceRefEvenEdit = () => import('../../pages/sourcerefevents/Edit.vue');

export default {
    name: 'sourcerefevents.edit',
    path: ':sourceRefEven/edit',
    component: SourceRefEvenEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Source Ref Even',
    },
};
