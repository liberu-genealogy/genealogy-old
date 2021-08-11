import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./publications', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/publications',
    component: RouterView,
    meta: {
        breadcrumb: 'publications',
        route: 'publications.index',
    },
    children: routes,
};
