import routeImporter from '../modules/importers/routeImporter';

const routes = routeImporter(require.context('./repository', false, /.*\.js$/));
const RouterView = () => import('../core/Router.vue');

export default {
    path: '/repository',
    component: RouterView,
    meta: {
        breadcrumb: 'repository',
        route: 'repository.index',
    },
    children: routes,
};
