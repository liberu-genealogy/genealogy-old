import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./authors', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/authors',
    component: RouterView,
    meta: {
        breadcrumb: 'authors',
        route: 'authors.index',
    },
    children: routes,
};
