import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./sourcedataevent', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/sourcedataevent',
    component: RouterView,
    meta: {
        breadcrumb: 'sourcedataevent',
        route: 'sourcedataevent.index',
    },
    children: routes,
};
