import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./personanci', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/personanci',
    component: RouterView,
    meta: {
        breadcrumb: 'personanci',
        route: 'personanci.index',
    },
    children: routes,
};
