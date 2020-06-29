import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./chan', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/chan',
    component: RouterView,
    meta: {
        breadcrumb: 'chan',
        route: 'chan.index',
    },
    children: routes,
};
