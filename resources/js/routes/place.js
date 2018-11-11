import routeImporter from '../modules/importers/routeImporter';

const routes = routeImporter(require.context('./place', false, /.*\.js$/));
const RouterView = () => import('../core/Router.vue');

export default {
    path: '/place',
    component: RouterView,
    meta: {
        breadcrumb: 'places',
        route: 'place.index',
    },
    children: routes,
};
