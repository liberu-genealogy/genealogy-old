import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./places', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/places',
    component: RouterView,
    meta: {
        breadcrumb: 'places',
        route: 'places.index',
    },
    children: routes,
};
