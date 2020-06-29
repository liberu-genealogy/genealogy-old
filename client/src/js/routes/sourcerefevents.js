import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./sourcerefevents', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/sourcerefevents',
    component: RouterView,
    meta: {
        breadcrumb: 'sourcerefevents',
        route: 'sourcerefevents.index',
    },
    children: routes,
};
