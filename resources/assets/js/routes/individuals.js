import routeImporter from '../modules/importers/routeImporter';

const routes = routeImporter(require.context('./individuals', false, /.*\.js$/));
const RouterView = () => import('../pages/layout/Router.vue');

export default {
    path: 'individuals/',
    component: RouterView,
    meta: {
        breadcrumb: 'individuals',
        route: 'individuals.index',
    },
    children: routes,
};
