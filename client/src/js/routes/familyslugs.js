import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./familyslugs', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/familyslugs',
    component: RouterView,
    meta: {
        breadcrumb: 'familyslugs',
        route: 'familyslugs.index',
    },
    children: routes,
};
