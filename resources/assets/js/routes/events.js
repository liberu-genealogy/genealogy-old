import routeImporter from '../modules/importers/routeImporter';

const routes = routeImporter(require.context('./events', false, /.*\.js$/));
const RouterView = () => import('../pages/layout/Router.vue');

export default {
    path: 'events/',
    component: RouterView,
    meta: {
        breadcrumb: 'events',
        route: 'events.index',
    },
    children: routes,
};
