const themeImporter = (requireContext) =>
  requireContext
    .keys()
    .map((fileName) => [
      fileName.replace(/(^.\/)|(\.lazy.scss$)/g, ''),
      requireContext(fileName),
    ])
    .reduce((themes, [name, theme]) => {
      return Object.assign({}, themes, { [name]: theme })
    }, {})

export default themeImporter
