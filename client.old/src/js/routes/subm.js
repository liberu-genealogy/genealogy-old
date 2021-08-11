import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./subm', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/subm',
    component: RouterView,
    meta: {
        breadcrumb: 'subm',
        route: 'subm.index',
    },
    children: routes,
};
