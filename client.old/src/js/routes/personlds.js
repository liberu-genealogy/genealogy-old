import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./personlds', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/personlds',
    component: RouterView,
    meta: {
        breadcrumb: 'personlds',
        route: 'personlds.index',
    },
    children: routes,
};
