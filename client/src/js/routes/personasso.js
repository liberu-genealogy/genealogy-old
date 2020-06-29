import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./personasso', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/personasso',
    component: RouterView,
    meta: {
        breadcrumb: 'personasso',
        route: 'personasso.index',
    },
    children: routes,
};
