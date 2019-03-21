import routeImporter from '@core-modules/importers/routeImporter';

const routes = routeImporter(require.context('./place', false, /.*\.js$/));
const RouterView = () => import('@core-pages/Router.vue');

export default {
    path: '/place',
    component: RouterView,
    meta: {
        breadcrumb: 'place',
        route: 'place.index',
    },
    children: routes,
};
