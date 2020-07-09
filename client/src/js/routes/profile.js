import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./profile', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/profile',
    component: RouterView,
    meta: {
        breadcrumb: 'profile',
        route: 'profile.index',
    },
    children: routes,
};
