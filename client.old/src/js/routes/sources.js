import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./sources', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/sources',
    component: RouterView,
    meta: {
        breadcrumb: 'sources',
        route: 'sources.index',
    },
    children: routes,
};
