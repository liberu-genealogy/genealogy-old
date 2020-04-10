import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./families', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/families',
    component: RouterView,
    meta: {
        breadcrumb: 'families',
        route: 'families.index',
    },
    children: routes,
};
