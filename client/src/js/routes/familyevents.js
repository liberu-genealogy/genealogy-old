import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./familyevents', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/familyevents',
    component: RouterView,
    meta: {
        breadcrumb: 'familyevents',
        route: 'familyevents.index',
    },
    children: routes,
};
