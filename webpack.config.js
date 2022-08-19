const path= require('path');
module.exports = {
  entry: "./resources/assets/js/app.js",
  output: {
    filename: "assets/js/main.js",
    path: path.resolve(__dirname, "public"),
  }
};
