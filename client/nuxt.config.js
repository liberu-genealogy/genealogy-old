import getSiteMeta from "./utils/getSiteMeta";

const meta = getSiteMeta();


export default {
    ssr: false,

  server: {
    host: process.env.HOST ||'localhost' // default: localhost
  },

  publicRuntimeConfig: {
    baseURL: process.env.BASE_URL || 'http://localhost:8000',
    appEnv: process.env.APP_ENV || 'production'
  },

  sitemap: [
    {
      hostname: process.env.BASE_URL || 'http://localhost:3000',
      path: '/sitemap.xml',
      gzip: true,
    }

  ],
    // Global page headers: https://go.nuxtjs.dev/config-head
  // Global page headers (https://go.nuxtjs.dev/config-head)
  head: {
    htmlAttrs: {
      lang: "en-GB",
    },
    title: "Family Tree 365 - Start your family tree today - free! Your first tree is 100% free. Sign-up to begin your genealogy journey today!",
    meta: [
      ...meta,
      {charset: "utf-8"},
      {name: "HandheldFriendly", content: "True"},
      {name: "viewport", content: "width=device-width, initial-scale=1"},
      {property: "og:site_name", content: "Family Tree 365"},
      {
        hid: "description",
        name: "description",
        content:
          "Our user-friendly yet powerful platform lets you create your own family tree the quick and easy way. No technical knowledge is required. Start your family tree today - free!",
      },
      {property: "og:image:width", content: "2500"},
      {property: "og:image:height", content: "780"},
      {name: "twitter:site", content: "@familytree365"},
      {name: "twitter:card", content: "summary_large_image"},
    ],
    link: [
      {rel: "icon", href: "/favicon.ico"},
      {
        hid: "canonical",
        rel: "canonical",
        href: process.env.BASE_URL,
      },
    ],
},
    // Global CSS: https://go.nuxtjs.dev/config-css
    css: [],

  env: {
    STRIPE_KEY: process.env.STRIPE_KEY,
    BASE_URL: process.env.BASE_URL,
    ECHO_PORT: process.env.ECHO_PORT,
  },

    // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
    plugins: [
        "~/plugins/bootEnums.js",
        "~/plugins/i18n.js",
        "~/plugins/pRoute.js",
	"~/plugins/vue-fb-customer-chat.js",
    ],

    // Auto import components: https://go.nuxtjs.dev/config-components
    components: true,

    // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
    buildModules: [
        // https://go.nuxtjs.dev/eslint
        "@nuxtjs/eslint-module",
    ],
  
nuxtContentAlgolia: {
    appId: process.env.ALGOLIA_APP_ID,
    apiKey: process.env.ALGOLIA_API_KEY,
    paths: [
      {
        name: 'articles',
        index: 'articles',
        fields: ['title', 'description', 'bodyPlainText']
      }
    ]
  },

    // Modules: https://go.nuxtjs.dev/config-modules
    modules: [
        // https://go.nuxtjs.dev/axios
        "@nuxtjs/axios",
        "nuxt-vuex-router-sync",
    ],

    // Axios module configuration: https://go.nuxtjs.dev/config-axios
    axios: {},

    // Build Configuration: https://go.nuxtjs.dev/config-build
    build: {
    filenames: {
      app: ({isDev}) => isDev ? '[name].js' : '[chunkhash].js',
      chunk: ({isDev}) => isDev ? '[name].js' : '[chunkhash].js',
      css: ({isDev}) => isDev ? '[name].css' : '[contenthash].css',
      img: ({isDev}) => isDev ? '[path][name].[ext]' : 'img/[hash:7].[ext]',
      font: ({isDev}) => isDev ? '[path][name].[ext]' : 'fonts/[hash:7].[ext]',
      video: ({isDev}) => isDev ? '[path][name].[ext]' : 'videos/[hash:7].[ext]'
    },

        transpile: [
            "@enso-ui/enums",
            "@sentry/browser",
            "@sentry/integrations",
            "@enso-ui/sentry",
            "@enso-ui/route-mapper",
	    "d3-dag",
        ],
    },
};
