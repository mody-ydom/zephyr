const path = require('path');

module.exports = {
  ident: 'postcss',
  // plugins: [
  //   require("autoprefixer"),
  //   require("postcss-extract-media-query"),
  // ],
  plugins: {
    'autoprefixer': {},
    // 'postcss-extract-media-query': {
    //   output: {
    //     path: path.join(__dirname, 'dist'),
    //     name: '[name]-[query].scss'
    //   },
    // }
  },
};