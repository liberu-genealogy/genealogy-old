import routeImporter from '../modules/importers/routeImporter';

const routes = routeImporter(require.context('./sources', false, /.*\.js$/));
const RouterView = () => import('../core/Router.vue');

export default {
    path: '/sources',
    component: RouterView,
    meta: {
        breadcrumb: 'sources',
        route: 'sources.index',
    },
    children: routes,
};
