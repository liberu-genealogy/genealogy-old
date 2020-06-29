import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./personlds', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/personlds',
    component: RouterView,
    meta: {
        breadcrumb: 'personlds',
        route: 'personlds.index',
    },
    children: routes,
};
