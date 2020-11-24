import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./families', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/families',
    component: RouterView,
    meta: {
        breadcrumb: 'families',
        route: 'families.index',
    },
    children: routes,
};
