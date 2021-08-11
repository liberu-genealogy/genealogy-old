import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./subn', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/subn',
    component: RouterView,
    meta: {
        breadcrumb: 'subn',
        route: 'subn.index',
    },
    children: routes,
};
