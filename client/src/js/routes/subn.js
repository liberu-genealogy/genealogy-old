import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./subn', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/subn',
    component: RouterView,
    meta: {
        breadcrumb: 'subn',
        route: 'subn.index',
    },
    children: routes,
};
