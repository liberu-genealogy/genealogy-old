import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./sourcedata', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/sourcedata',
    component: RouterView,
    meta: {
        breadcrumb: 'sourcedata',
        route: 'sourcedata.index',
    },
    children: routes,
};
