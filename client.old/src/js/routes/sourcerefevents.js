import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./sourcerefevents', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/sourcerefevents',
    component: RouterView,
    meta: {
        breadcrumb: 'sourcerefevents',
        route: 'sourcerefevents.index',
    },
    children: routes,
};
