import routeImporter from '@core-modules/importers/routeImporter';

const routes = routeImporter(require.context('./repository', false, /.*\.js$/));
const RouterView = () => import('@core-pages/Router.vue');

export default {
    path: '/repository',
    component: RouterView,
    meta: {
        breadcrumb: 'repository',
        route: 'repository.index',
    },
    children: routes,
};
