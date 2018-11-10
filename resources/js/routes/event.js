import routeImporter from '../modules/importers/routeImporter';

const routes = routeImporter(require.context('./event', false, /.*\.js$/));
const RouterView = () => import('../core/Router.vue');

export default {
    path: '/event',
    component: RouterView,
    meta: {
        breadcrumb: 'event',
        route: 'event.index',
    },
    children: routes,
};
