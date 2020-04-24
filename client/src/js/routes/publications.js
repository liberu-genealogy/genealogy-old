import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./publications', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/publications',
    component: RouterView,
    meta: {
        breadcrumb: 'publications',
        route: 'publications.index',
    },
    children: routes,
};
