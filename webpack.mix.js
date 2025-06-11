const mix = require("laravel-mix");

mix
  .setPublicPath("public") // Directory where compiled assets are stored
  .webpackConfig({
    output: {
      publicPath: "/public/", // Explicitly include 'public' in the URL
    },
   
  })
  .js("resources/assets/js/index.js", "js")
  .sass("resources/assets/sass/main.scss", "css")
  .extract()
  .sourceMaps() // Keep source maps but let devtool define the type
  .options({
    legacyNodePolyfills: true,
  });

// If you want to enable versioning (for cache busting)
// uncomment the line below
mix.version();

// You can copy files or directories
// mix.copy('resources/img', 'public/img');

// For production environments
if (mix.inProduction()) {
  mix.version();
}

mix.webpackConfig({
  optimization: {
    splitChunks: {
      chunks: "async",
      minSize: 20000,
      minChunks: 1,
      maxAsyncRequests: 30,
      maxInitialRequests: 30,
      enforceSizeThreshold: 50000,
      cacheGroups: {
        defaultVendors: {
          test: /[\\/]node_modules[\\/]/,
          priority: -10,
        },
        default: {
          minChunks: 2,
          priority: -20,
          reuseExistingChunk: true,
        },
      },
    },
  },
});

mix.babelConfig({
  plugins: ["@babel/plugin-syntax-dynamic-import"],
});
