import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./personasso', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/personasso',
    component: RouterView,
    meta: {
        breadcrumb: 'personasso',
        route: 'personasso.index',
    },
    children: routes,
};
