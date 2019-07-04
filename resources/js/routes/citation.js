import routeImporter from '@core-modules/importers/routeImporter';

const routes = routeImporter(require.context('./citation', false, /.*\.js$/));
const RouterView = () => import('@core-pages/Router.vue');

export default {
    path: '/citation',
    component: RouterView,
    meta: {
        breadcrumb: 'citation',
        route: 'citation.index',
    },
    children: routes,
};
