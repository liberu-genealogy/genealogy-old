import RouteMapper from '@enso-ui/route-mapper'

export default ({ store }, inject) => {
  inject('pRoute', (name, params, absolute) => {
    const { meta, routes } = store.state

    return new RouteMapper(meta.appUrl, routes).get(name, params, absolute)
  })
}
