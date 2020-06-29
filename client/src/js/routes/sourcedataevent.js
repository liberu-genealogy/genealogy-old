import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./sourcedataevent', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/sourcedataevent',
    component: RouterView,
    meta: {
        breadcrumb: 'sourcedataevent',
        route: 'sourcedataevent.index',
    },
    children: routes,
};
