import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./notes', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/notes',
    component: RouterView,
    meta: {
        breadcrumb: 'notes',
        route: 'notes.index',
    },
    children: routes,
};
