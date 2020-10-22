const path = require('path');
const webpack = require('webpack');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const glob = require('glob');


module.exports = function (env, argv) {
  const files = glob.sync('./src/components/**/*.js');
  const entry = argv.mode === 'development' ? {'general': ['./src/index.js']} : {'general': ['./src/index.js', './src/components/header-component/style.scss', './src/components/footer-component/style.scss']};
  for (const file of files) {
    const fileName = file.match(/components\/(.*)\/index\.js/);
    if (fileName) {
      entry[file.match(/components\/(.*)\/index\.js/)[1]] = [file, file.replace('index.js', 'style.scss')];
      if (argv.mode === 'development') {
        entry.general.push(file.replace('index.js', 'style.scss'));
      }
    }
  }
  return {
    entry,
    output: {
      filename: (pathData) => {
        return pathData.chunk.name === 'general' ? 'main.js' : 'trash-compiled-files/[name].js';
      },
      path: path.resolve(__dirname, '../assets/'),
      publicPath: './',
    },
    watch: false,
    module: {
      rules: [
        {
          test: /\.html$/i,
          use: argv.mode === 'production' ? 'ignore-loader' : [
            {
              loader: 'file-loader',
              options: {
                name: function (fileName) {
                  const parts = fileName.replace(/\\/g, '/').split('/');
                  const len = parts.length;
                  
                  if (parts[len - 2] === 'html') {
                    return parts[len - 1];
                  }
                  return `${parts[len - 2]}.html`;
                },
              },
            },
            'extract-loader',
            {
              loader: 'html-loader', options: {
                attributes: {
                  list: [
                    {
                      // Tag name
                      tag: 'img',
                      // Attribute name
                      attribute: 'src',
                      // Type of processing, can be `src` or `scrset`
                      type: 'src',
                    },
                    {
                      // Tag name
                      tag: 'img',
                      // Attribute name
                      attribute: 'srcset',
                      // Type of processing, can be `src` or `scrset`
                      type: 'srcset',
                    },
                    {
                      tag: 'img',
                      attribute: 'data-src',
                      type: 'src',
                    },
                    {
                      tag: 'img',
                      attribute: 'data-srcset',
                      type: 'srcset',
                    },
                  ],
                  urlFilter: (attribute, value, resourcePath) => {
                    return !/style.css$/.test(value) && !/main.css$/.test(value) && !/main.js$/.test(value);
                  },
                },
              },
            }],
          
        },
        {
          test: /\.jsx?$/,
          exclude: /(node_modules|bower_components)/,
          use: {
            loader: 'babel-loader',
            options: {
              presets: ['@babel/env'],
              plugins: [
                '@babel/plugin-proposal-class-properties',
                '@babel/plugin-proposal-object-rest-spread',
                '@babel/plugin-proposal-export-default-from',
                '@babel/plugin-proposal-export-namespace-from',
              ],
            },
          },
        }, {
          test: /\.s?css$/,
          use: [
            argv.mode === 'production' ? MiniCssExtractPlugin.loader : 'style-loader',
            {loader: 'css-loader', options: {importLoaders: 1, sourceMap: true}},
            {loader: 'postcss-loader', options: {}},
            {loader: 'sass-loader', options: {sourceMap: true}},
          ],
        }, {
          test: /\.(woff(2)?|ttf|eot|otf|svg)(\?v=\d+\.\d+\.\d+)?$/,
          use: [{
            loader: 'file-loader',
            options: {
              name: '[folder]/[name].[ext]',
              publicPath: argv.mode === 'development' ? '/zephyr/wp-content/themes/zephyr/assets' : './',
            },
          }],
        }, {
          test: /node_module.*\.(png|svg|jpg|gif)$/,
          use: [{
            loader: 'file-loader',
            options: {
              publicPath: function (url) {
                return './' + url;
              },
              name: 'assets/[folder]/[name].[ext]',
            },
          }],
        }, {
          test: /\.(png|svg|jpg|gif)$/,
          exclude: /node_modules/,
          use: [{
            loader: 'file-loader',
            options: {
              publicPath: function (url) {
                return './' + url;
              },
              name: '[path][name].[ext]',
              context: path.resolve(__dirname, './src/html'),
            },
          }],
        },
      ],
    },
    optimization: {
      sideEffects: false,
    },
    plugins: [
      new MiniCssExtractPlugin({
        moduleFilename: ({name}) => name === 'general' ? 'main.css' : '../template-parts/blocks/[name]/style.css',
      }),
      new webpack.DefinePlugin({
        'process.env.NODE_ENV': JSON.stringify(process.env.NODE_ENV || 'development'),
      }),
    ],
    devtool: argv.mode === 'production' ? 'cheap-module-source-map' : 'eval-cheap-module-source-map',
    devServer: {
      contentBase: path.resolve(__dirname, '../assets/'),
      writeToDisk: true,
      // historyApiFallback: true,
    },
  };
};