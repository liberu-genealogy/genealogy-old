import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./addresses', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/addresses',
    component: RouterView,
    meta: {
        breadcrumb: 'addresses',
        route: 'addresses.index',
    },
    children: routes,
};
