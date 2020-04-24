import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./authors', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/authors',
    component: RouterView,
    meta: {
        breadcrumb: 'authors',
        route: 'authors.index',
    },
    children: routes,
};
