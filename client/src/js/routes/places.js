import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./places', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/places',
    component: RouterView,
    meta: {
        breadcrumb: 'places',
        route: 'places.index',
    },
    children: routes,
};
