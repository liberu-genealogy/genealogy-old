import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./chan', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/chan',
    component: RouterView,
    meta: {
        breadcrumb: 'chan',
        route: 'chan.index',
    },
    children: routes,
};
