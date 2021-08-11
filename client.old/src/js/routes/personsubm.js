import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./personsubm', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/personsubm',
    component: RouterView,
    meta: {
        breadcrumb: 'personsubm',
        route: 'personsubm.index',
    },
    children: routes,
};
