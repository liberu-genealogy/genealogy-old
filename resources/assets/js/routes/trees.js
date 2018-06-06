import routeImporter from '../modules/importers/routeImporter';

const routes = routeImporter(require.context('./trees', false, /.*\.js$/));
const RouterView = () => import('../pages/layout/Router.vue');

export default {
    path: '/trees/',
    component: RouterView,
    meta: {
        breadcrumb: 'trees',
        route: 'trees.index',
    },
    children: routes,
};
