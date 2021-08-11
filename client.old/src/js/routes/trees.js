import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./trees', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/trees',
    component: RouterView,
    meta: {
        breadcrumb: 'trees',
        route: 'trees.index',
    },
    children: routes,
};
