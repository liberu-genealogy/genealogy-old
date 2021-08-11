import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./types', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/types',
    component: RouterView,
    meta: {
        breadcrumb: 'types',
        route: 'types.index',
    },
    children: routes,
};
