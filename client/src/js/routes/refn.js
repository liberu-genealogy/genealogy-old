import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./refn', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/refn',
    component: RouterView,
    meta: {
        breadcrumb: 'refn',
        route: 'refn.index',
    },
    children: routes,
};
