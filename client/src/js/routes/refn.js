import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./refn', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/refn',
    component: RouterView,
    meta: {
        breadcrumb: 'refn',
        route: 'refn.index',
    },
    children: routes,
};
