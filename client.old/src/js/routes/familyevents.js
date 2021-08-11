import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./familyevents', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/familyevents',
    component: RouterView,
    meta: {
        breadcrumb: 'familyevents',
        route: 'familyevents.index',
    },
    children: routes,
};
