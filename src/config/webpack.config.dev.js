const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const SpriteLoaderPlugin = require('svg-sprite-loader/plugin')
const BrowserSyncPlugin = require('browser-sync-webpack-plugin')
const { merge } = require('webpack-merge')

const paths = require('./paths')
const common = require('./webpack.config.js')

module.exports = merge(common, {
  mode: 'development',
  devtool: 'inline-source-map',
  target: 'browserslist',

  module: {
    rules: [
      {
        test: /\.s?css$/i,
        use: [
          MiniCssExtractPlugin.loader,
          // 'style-loader',
          {
            loader: 'css-loader',
            options: {
              sourceMap: true, importLoaders: 1, modules: false,
            },
          },
          {
            loader: 'postcss-loader',
            options: {
              sourceMap: true,
              postcssOptions: {
                config: `${paths.config_dir}/postcss.config.js`,
              },
            },
          },
          { loader: 'sass-loader', options: { sourceMap: true } },
        ],
      },
      {
        test: /src\/images\/icons\/.*\.svg(\?[a-z0-9=\.]+)?$/,
        // test: /\.svg$/,
        use: [
          {
            loader: 'svg-sprite-loader',
            options: {
              symbolId: 'icon-[name]',
            },
          },
          {
            loader: 'svgo-loader',
            options: {
              multipass: true,
              plugins: [
                {
                  name: 'removeAttrs',
                  params: {
                    attrs: ['path:fill', 'path:class'],
                  },
                },
              ],
            },
          },
        ],
      },
    ],
  },

  plugins: [

    new MiniCssExtractPlugin({
      filename: 'styles/[name].css',
      chunkFilename: '[id].css',
    }),

    // Create hidden SVG sprite with inline style.
    new SpriteLoaderPlugin(),

    new BrowserSyncPlugin({

      files: [
        '**/*.php',
        '**/*.css',
        // {
        //   match: '**/*.js',
        //   options: {
        //     ignored: 'assets/**/*.js', // the js output folder
        //   },
        // },
      ],
      // files: [{ match: ['**/*.php', '**/*.css'] }],

      reloadDelay: 0,
      // host: 'woodstock-dev',
      port: 3000,
      proxy: 'woodstock-dev:8888',
      open: false,
      notify: true,
    }, { reload: true }),

  ],

})
