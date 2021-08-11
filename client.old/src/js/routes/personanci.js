import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./personanci', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/personanci',
    component: RouterView,
    meta: {
        breadcrumb: 'personanci',
        route: 'personanci.index',
    },
    children: routes,
};
