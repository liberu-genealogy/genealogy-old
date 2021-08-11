import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./objects', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/objects',
    component: RouterView,
    meta: {
        breadcrumb: 'objects',
        route: 'objects.index',
    },
    children: routes,
};
