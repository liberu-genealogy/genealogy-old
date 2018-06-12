import routeImporter from '../modules/importers/routeImporter';

const routes = routeImporter(require.context('./families', false, /.*\.js$/));
const RouterView = () => import('../core/Router.vue');

export default {
    path: '/families/',
    component: RouterView,
    meta: {
        breadcrumb: 'families',
        route: 'families.index',
    },
    children: routes,
};
