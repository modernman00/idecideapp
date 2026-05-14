const mix = require("laravel-mix");

// Custom devtool based on environment
const devtool = mix.inProduction() 
  ? 'source-map'         // Production (full source maps)
  : 'cheap-module-source-map'; // Development (CSP-friendly)

mix
  .setPublicPath("public")
  .webpackConfig({
    output: { publicPath: "/public/" },
    devtool, // <-- Add this line to configure sourcemap type
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
    }
  })
  .js("resources/assets/js/index.js", "js")
  .sass("resources/assets/sass/main.scss", "css")
  .extract()
  .options({ 
    legacyNodePolyfills: true
  });

// Enable versioning in production
if (mix.inProduction()) {
  mix.version();
}

if (process.env.MIX_SOURCEMAPS !== 'false') {
  mix.webpackConfig({ devtool });
}

mix.babelConfig({
  plugins: ["@babel/plugin-syntax-dynamic-import"],
});

mix.override((config) => {
  config.plugins = config.plugins.filter(plugin => {
    const name = plugin.constructor && plugin.constructor.name;
    const isProgress = name === 'ProgressPlugin' || name === 'WebpackBarPlugin';
    const hasWebpackBarOptions = plugin.options && (plugin.options.name === 'Mix' || plugin.options.reporters);
    
    return !isProgress && !hasWebpackBarOptions;
  });
});