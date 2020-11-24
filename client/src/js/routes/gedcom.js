import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./gedcom', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/gedcom',
    component: RouterView,
    meta: {
        breadcrumb: 'gedcom',
        route: 'gedcom.index',
    },
    children: routes,
};
