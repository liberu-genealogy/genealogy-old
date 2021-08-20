export const state = () => ({
  items: [],
  isVisible: false,
})

export const getters = {
  items: (state, getters, rootState, rootGetters) =>
    state.items
      .concat()
      .sort((a, b) => a.order - b.order)
      .filter(
        ({ permission }) =>
          !permission || rootGetters.routes.includes(permission)
      )
      .map((item) => item.component),
}

export const mutations = {
  registerItem: (state, item) => {
    state.items.push(item)
  },
  show: (state) => (state.isVisible = true),
  hide: (state) => (state.isVisible = false),
}
