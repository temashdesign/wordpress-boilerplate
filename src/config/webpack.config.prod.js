const TerserPlugin = require('terser-webpack-plugin')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin')
const SpriteLoaderPlugin = require('svg-sprite-loader/plugin')
const UnminifiedWebpackPlugin = require('unminified-webpack-plugin')
const { BundleAnalyzerPlugin } = require('webpack-bundle-analyzer')

const { merge } = require('webpack-merge')
const paths = require('./paths')
const common = require('./webpack.config.js')

module.exports = merge(common, {
  mode: 'production',
  devtool: false,
  target: 'web',

  // Where webpack outputs the assets and bundles
  output: {
    filename: 'js/[name].min.js',
  },

  module: {
    rules: [
      {
        test: /\.s?css$/i,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: {
              sourceMap: true, importLoaders: 1, modules: false,
            },
          },
          {
            loader: 'postcss-loader',
            options: {
              postcssOptions: {
                config: `${paths.config_dir}/postcss.config.js`,
              },
            },
          },
          {
            loader: 'sass-loader',
            options: {
              sassOptions: {
                sourceMap: false,
                minimize: true,
                outputStyle: 'expanded',
              },
            },
          },
        ],
      },
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
        },
      },

      {
        test: /images\/icons\/.*\.svg(\?[a-z0-9=\.]+)?$/,
        // test: /\.svg$/,

        use: [
          {
            loader: 'svg-sprite-loader',
            options: {
              symbolId: 'icon-[name]',
              extract: true,
              spriteFilename: 'images/svg-sprite/icons.svg',
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
    // new BundleAnalyzerPlugin(),
    // Extracts CSS into separate files
    new MiniCssExtractPlugin({
      filename: 'styles/[name].min.css',
      chunkFilename: 'styles/[name].min.css',
    }),

    // Create hidden SVG sprite with inline style.
    new SpriteLoaderPlugin({ plainSprite: true, spriteAttrs: { style: 'display: none;' } }),
    new UnminifiedWebpackPlugin(),
  ],

  optimization: {
    minimize: true,
    minimizer: [
      // Optimize for production build.
      new CssMinimizerPlugin(),

      new TerserPlugin({
        terserOptions: {
          sourceMap: true,
          output: {
            comments: false,
          },
          compress: {
            warnings: false,
            drop_console: true, // eslint-disable-line camelcase
          },
        },
      }),
    ],
  },
  performance: {
    hints: false,
    maxEntrypointSize: 512000,
    maxAssetSize: 512000,
  },

})
