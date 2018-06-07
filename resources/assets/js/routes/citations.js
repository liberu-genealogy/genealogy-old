import routeImporter from '../modules/importers/routeImporter';

const routes = routeImporter(require.context('./citations', false, /.*\.js$/));
const RouterView = () => import('../pages/layout/Router.vue');

export default {
    path: '/citations/',
    component: RouterView,
    meta: {
        breadcrumb: 'citations',
        route: 'citations.index',
    },
    children: routes,
};
