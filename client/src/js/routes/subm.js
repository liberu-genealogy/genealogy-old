import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./subm', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/subm',
    component: RouterView,
    meta: {
        breadcrumb: 'subm',
        route: 'subm.index',
    },
    children: routes,
};
