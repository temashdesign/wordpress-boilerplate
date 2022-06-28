const path = require('path');

const mode = process.env.NODE_ENV || "development";
// Temporary workaround for 'browserslist' bug that is being patched in the near future
const target = process.env.NODE_ENV === "production" ? "browserslist" : "web";


module.exports = {
  mode: mode,

  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
        }
      }
    ]
  },
  target: target,
  devtool: 'source-map',

  devServer: {
    static: {
      directory: path.join(__dirname, 'dist'),
    },
  }
}