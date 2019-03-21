import routeImporter from '@core-modules/importers/routeImporter';

const routes = routeImporter(require.context('./individual', false, /.*\.js$/));
const RouterView = () => import('@core-pages/Router.vue');

export default {
    path: '/individual',
    component: RouterView,
    meta: {
        breadcrumb: 'individual',
        route: 'individual.index',
    },
    children: routes,
};
