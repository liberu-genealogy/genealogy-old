import routeImporter from '../modules/importers/routeImporter';

const routes = routeImporter(require.context('./places', false, /.*\.js$/));
const RouterView = () => import('../core/Router.vue');

export default {
    path: '/places',
    component: RouterView,
    meta: {
        breadcrumb: 'places',
        route: 'places.index',
    },
    children: routes,
};
