const SourceDataEvenEdit = () => import('../../pages/sourcedataevent/Edit.vue');

export default {
    name: 'sourcedataevent.edit',
    path: ':sourceDataEven/edit',
    component: SourceDataEvenEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Source Data Even',
    },
};
