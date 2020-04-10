import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./notes', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/notes',
    component: RouterView,
    meta: {
        breadcrumb: 'notes',
        route: 'notes.index',
    },
    children: routes,
};
