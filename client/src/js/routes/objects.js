import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./objects', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/objects',
    component: RouterView,
    meta: {
        breadcrumb: 'objects',
        route: 'objects.index',
    },
    children: routes,
};
