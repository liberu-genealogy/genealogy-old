import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./sourcedata', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/sourcedata',
    component: RouterView,
    meta: {
        breadcrumb: 'sourcedata',
        route: 'sourcedata.index',
    },
    children: routes,
};
