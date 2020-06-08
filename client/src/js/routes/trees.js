import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./trees', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/trees',
    component: RouterView,
    meta: {
        breadcrumb: 'trees',
        route: 'trees.index',
    },
    children: routes,
};
