import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./sources', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/sources',
    component: RouterView,
    meta: {
        breadcrumb: 'sources',
        route: 'sources.index',
    },
    children: routes,
};
