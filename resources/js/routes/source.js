import routeImporter from '../modules/importers/routeImporter';

const routes = routeImporter(require.context('./source', false, /.*\.js$/));
const RouterView = () => import('../core/Router.vue');

export default {
    path: '/source',
    component: RouterView,
    meta: {
        breadcrumb: 'sources',
        route: 'source.index',
    },
    children: routes,
};
