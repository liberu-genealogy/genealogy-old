import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./personalias', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/personalias',
    component: RouterView,
    meta: {
        breadcrumb: 'personalias',
        route: 'personalias.index',
    },
    children: routes,
};
