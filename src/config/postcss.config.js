module.exports = {
  plugins: {
    // 'postcss-flexbugs-fixes': {},
    'postcss-import': {},
    'postcss-preset-env': {
      browsers: 'last 2 versions',
      stage: 0,
    },
    tailwindcss: {},
    autoprefixer: {},
    // cssnano: {},
  },
}
