import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./personsubm', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/personsubm',
    component: RouterView,
    meta: {
        breadcrumb: 'personsubm',
        route: 'personsubm.index',
    },
    children: routes,
};
