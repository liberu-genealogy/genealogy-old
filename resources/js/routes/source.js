import routeImporter from '@core-modules/importers/routeImporter';

const routes = routeImporter(require.context('./source', false, /.*\.js$/));
const RouterView = () => import('@core-pages/Router.vue');

export default {
    path: '/source',
    component: RouterView,
    meta: {
        breadcrumb: 'source',
        route: 'source.index',
    },
    children: routes,
};
