const SubnShow = () => import('../../pages/subn/Show.vue');

export default {
    name: 'subn.show',
    path: ':subn',
    component: SubnShow,
    meta: {
        breadcrumb: 'show',
        title: 'Show Subn',
    },
};
