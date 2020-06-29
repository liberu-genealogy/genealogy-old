import routeImporter from '@core/modules/importers/routeImporter';

const routes = routeImporter(require.context('./personevent', false, /.*\.js$/));
const RouterView = () => import('@core/bulma/pages/Router.vue');

export default {
    path: '/personevent',
    component: RouterView,
    meta: {
        breadcrumb: 'personevent',
        route: 'personevent.index',
    },
    children: routes,
};
