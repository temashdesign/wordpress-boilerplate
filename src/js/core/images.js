function requireAll(r) {
  r.keys().forEach(r)
}

requireAll(require.context('../../images/icons/', true, /\.svg$/))
requireAll(require.context('../../images/', true, /\.(jpe?g|png|gif|ico)$/))
