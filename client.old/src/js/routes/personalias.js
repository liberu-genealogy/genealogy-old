import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./personalias', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/personalias',
    component: RouterView,
    meta: {
        breadcrumb: 'personalias',
        route: 'personalias.index',
    },
    children: routes,
};
