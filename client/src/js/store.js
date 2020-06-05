import Vue from 'vue';
import Vuex from 'vuex';
import {
    coreModules, coreState, coreGetters, coreMutations, coreActions,
} from '@core/modules/store';

import storeImporter from '@core/modules/importers/storeImporter';

const modules = storeImporter(require.context('./store', false, /.*\.js$/));

Vue.use(Vuex);
Vue.prototype.PUSHER_KEY = '2e7bbf1d37acc270e41f';
Vue.prototype.PUSHER_CLUSTER = 'eu';

const state = {};
const getters = {};
const mutations = {};
const actions = {};

export default new Vuex.Store({
    strict: true,
    modules: { ...coreModules, ...modules },
    state: { ...coreState, ...state },
    getters: { ...coreGetters, ...getters },
    mutations: { ...coreMutations, ...mutations },
    actions: { ...coreActions, ...actions },
});
