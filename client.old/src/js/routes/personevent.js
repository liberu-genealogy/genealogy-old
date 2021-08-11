import routeImporter from '@enso-ui/ui/src/modules/importers/routeImporter';

const routes = routeImporter(require.context('./personevent', false, /.*\.js$/));
const RouterView = () => import('@enso-ui/ui/src/bulma/pages/Router.vue');

export default {
    path: '/personevent',
    component: RouterView,
    meta: {
        breadcrumb: 'personevent',
        route: 'personevent.index',
    },
    children: routes,
};
