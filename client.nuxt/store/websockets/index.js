import Echo from 'laravel-echo'
// import Pusher from 'pusher-js';

export const state = () => ({
  channels: null,
  pusher: null,
})

export const getters = {
  channels: (state) => state.channels,
}

export const mutations = {
  configure: (state, config) => {
    state.channels = config.channels
    state.pusher = config.pusher
  },
}

export const actions = {
  connect: ({ state }) => {
    if (!window.Echo) {
      window.Echo = new Echo({
        broadcaster: 'pusher',
        key: state.pusher.key,
        cluster: state.pusher.options.cluster,
        useTLS: state.pusher.options.useTLS,
        namespace: 'App.Events',
      })

      window.Echo.connector.pusher.config.authEndpoint =
        '/api/broadcasting/auth'
    }
  },
}
