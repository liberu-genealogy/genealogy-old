import routeImporter from '../modules/importers/routeImporter';

const routes = routeImporter(require.context('./relationship', false, /.*\.js$/));
const RouterView = () => import('../core/Router.vue');

export default {
    path: '/relationship',
    component: RouterView,
    meta: {
        breadcrumb: 'relationship',
        route: 'relationship.index',
    },
    children: routes,
};
