import routeImporter from '../modules/importers/routeImporter';

const routes = routeImporter(require.context('./family', false, /.*\.js$/));
const RouterView = () => import('../core/Router.vue');

export default {
    path: '/family',
    component: RouterView,
    meta: {
        breadcrumb: 'family',
        route: 'family.index',
    },
    children: routes,
};
