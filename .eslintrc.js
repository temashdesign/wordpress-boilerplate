module.exports = {
  env: {
    browser: true,
    es2021: true,
  },
  extends: 'airbnb-base',
  parserOptions: {
    ecmaVersion: 13,
    sourceType: 'module',
  },
  rules: {
    'no-console': 0,
    semi: ['error', 'never'],
    'import/no-extraneous-dependencies': ['error', { devDependencies: true }],
    'import/no-unresolved': [2, { commonjs: true, amd: true }],
  },
  plugins: [
    'jsdoc',
  ],
  settings: {
    'import/resolver': {
      node: {
        extensions: ['.js', '.jsx', '.ts', '.tsx'],
      },
    },
  },
}
