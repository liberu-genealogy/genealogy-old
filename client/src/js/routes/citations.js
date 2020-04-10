import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./citations', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/citations',
    component: RouterView,
    meta: {
        breadcrumb: 'citations',
        route: 'citations.index',
    },
    children: routes,
};
