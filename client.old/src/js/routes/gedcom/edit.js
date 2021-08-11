const GedcomEdit = () => import('../../pages/gedcom/Edit.vue');

export default {
    name: 'gedcom.edit',
    path: ':gedcom/edit',
    component: GedcomEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Gedcom',
    },
};
