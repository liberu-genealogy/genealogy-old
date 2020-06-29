import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./addresses', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/addresses',
    component: RouterView,
    meta: {
        breadcrumb: 'addresses',
        route: 'addresses.index',
    },
    children: routes,
};
