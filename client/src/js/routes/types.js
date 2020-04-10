import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./types', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/types',
    component: RouterView,
    meta: {
        breadcrumb: 'types',
        route: 'types.index',
    },
    children: routes,
};
