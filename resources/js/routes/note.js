import routeImporter from '@core-modules/importers/routeImporter';

const routes = routeImporter(require.context('./note', false, /.*\.js$/));
const RouterView = () => import('@core-pages/Router.vue');

export default {
    path: '/note',
    component: RouterView,
    meta: {
        breadcrumb: 'note',
        route: 'note.index',
    },
    children: routes,
};
