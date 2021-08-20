import Enum from '@enso-ui/enums'

export default (context, inject) => {
  inject('bootEnums', (enums, i18n) => {
    const obj = {}

    Object.keys(enums).forEach(
      (enumName) => (obj[enumName] = new Enum(enums[enumName], i18n))
    )

    return obj
  })
}
