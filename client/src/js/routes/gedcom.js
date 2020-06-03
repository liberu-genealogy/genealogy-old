import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./gedcom', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/gedcom',
    component: RouterView,
    meta: {
        breadcrumb: 'gedcom',
        route: 'gedcom.index',
    },
    children: routes,
};
