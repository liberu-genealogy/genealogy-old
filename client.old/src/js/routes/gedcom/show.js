const GedcomShow = () => import('../../pages/gedcom/Show.vue');

export default {
    name: 'gedcom.show',
    path: ':gedcom',
    component: GedcomShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Gedcom',
    },
};
