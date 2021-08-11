import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./familyslugs', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/familyslugs',
    component: RouterView,
    meta: {
        breadcrumb: 'familyslugs',
        route: 'familyslugs.index',
    },
    children: routes,
};
