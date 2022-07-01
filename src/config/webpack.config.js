const { CleanWebpackPlugin } = require('clean-webpack-plugin')
const WebpackBar = require('webpackbar')
const ImageMinimizerPlugin = require('image-minimizer-webpack-plugin')
const { extendDefaultPlugins } = require('svgo')

const paths = require('./paths')

module.exports = {

  // Where webpack looks to start building the bundle
  entry: {
    app: `${paths.js_dir}/app.js`,
  },

  // Where webpack outputs the assets and bundles
  output: {
    path: paths.build_dir,
    assetModuleFilename: 'images/[name][ext][query]',
    filename: 'js/[name].js',
    chunkFilename: 'js/[name].[chunkhash].bundle.js',
    // clean: true,
  },

  resolve: {
    alias: {
      '@utils': `${paths.js_dir}/utils/`,
      '@core': `${paths.js_dir}/core/`,
      '@components': `${paths.js_dir}/components/`,
      '@transitions': `${paths.js_dir}/transitions/`,
      '@views': `${paths.js_dir}/views/`,
    },
  },

  module: {
    rules: [
    //   {
    //     test: /\.js$/,
    //     exclude: /node_modules/,
    //     use: {
    //       loader: 'babel-loader',
    //     },
    //   },
      {
        test: /\.(jpe?g|png|gif|ico|eot|ttf|woff2?)(\?v=\d+\.\d+\.\d+)?$/i,
        type: 'asset/resource',
      },
    ],
  },

  plugins: [
    new WebpackBar(),

    // Removes/cleans build folders and unused assets when rebuilding
    new CleanWebpackPlugin(),
  ],

  optimization: {
    // runtimeChunk: false,
    splitChunks: {
      cacheGroups: {
        vendor: {
          test: /[\\/]node_modules[\\/]/,
          name: 'vendor',
          chunks: 'all',
        },
      },
    },
    minimizer: [
      new ImageMinimizerPlugin({
        // Disable loader
        loader: false,
        // Allows to keep original asset and minimized assets with different filenames
        deleteOriginalAssets: true,
        minimizer: {
          // filename: () => "images/[path][name][ext]",
          implementation: ImageMinimizerPlugin.imageminMinify,
          options: {
            plugins: [
              ['gifsicle', { interlaced: true }],
              ['jpegtran', { progressive: true }],
              ['optipng', { optimizationLevel: 5 }],
            ],
          },
        },

      }),
    ],
  },

  externals: {
    jquery: 'jQuery',
  },
}
