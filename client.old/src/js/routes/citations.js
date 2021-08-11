import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./citations', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/citations',
    component: RouterView,
    meta: {
        breadcrumb: 'citations',
        route: 'citations.index',
    },
    children: routes,
};
