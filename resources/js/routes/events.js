import routeImporter from '@core-modules/importers/routeImporter';

const routes = routeImporter(require.context('./events', false, /.*\.js$/));
const RouterView = () => import('@core-pages/Router.vue');

export default {
    path: '/events',
    component: RouterView,
    meta: {
        breadcrumb: 'events',
        route: 'events.index',
    },
    children: routes,
};
