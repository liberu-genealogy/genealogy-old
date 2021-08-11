import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./repositories', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/repositories',
    component: RouterView,
    meta: {
        breadcrumb: 'repositories',
        route: 'repositories.index',
    },
    children: routes,
};
