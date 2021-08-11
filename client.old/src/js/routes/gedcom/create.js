const GedcomCreate = () => import('../../pages/gedcom/Create.vue');

export default {
    name: 'gedcom.create',
    path: 'create',
    component: GedcomCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Gedcom',
    },
};
