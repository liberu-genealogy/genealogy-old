  import Vuex from "vuex";
  import Vue from 'vue';

import moment from 'moment'

Vue.filter('formatDate', function(value) {
  if (value) {
    return moment(String(value)).format('MM/DD/YYYY hh:mm')
  }
});

export const state = () => ({
  person: {},
  people: {},
  chatMessages: '',
  role: {},
  permission: [],
});

export const getters = {
  getPerson: (state) => state.person,
  getPeople: (state) => state.people,
  isAuthenticated(state) {
    return state.auth.loggedIn
  },

  loggedInUser(state) {
    return state.auth.user
  },
  getRole: (state) => state.role,
  getPermission: (state) => state.permission,
};

export const mutations = {
  SET_PERSON(state, person) {
    state.person = person;
  },
  SET_PEOPLE(state, people) {
    state.people = people;
  },
  SET_ROLE(state , role) {
    state.role = role
  },
  SET_PERMISSION(state , permission) {
    state.permission = permission
  },
  SET_UNREAD_COUNT(state, count){
    state.auth.user.unreadMsgCount = count;
  }
};

export const actions = {
  loadPerson({ commit, state }, id) {
    const person = state.people.find(person => person.id == id)
    commit("SET_PERSON", person);
  },

  loadAccount({ commit, state }, id) {
    const account = state.accounts.find(account => account.id == id)
    commit("SET_ACCOUNT", account);
  },
  async loadPeople({ commit }) {
    const people = await this.$axios.$get("/api/person?start=0&length=10");
    commit("SET_PEOPLE", people);
  },
  async deletePeople({ commit, dispatch }, id) {
    this.$axios
      .$delete("/api/person/" + id)
      .then(response => ( this.$router.push('/people') )) 
  },
  async loadRole({ commit }) {
    const role = await this.$axios.$get("/api/roles");
    commit("SET_ROLE", role);
  },
  async loadPermission({ commit }) {
    const permission = await this.$axios.$get("/api/permissions");
    commit("SET_PERMISSION", permission);
  },
};

export default {
  state,
  getters,
  mutations,
  actions,
};
