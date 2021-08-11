import getSiteMeta from "./utils/getSiteMeta";

const meta = getSiteMeta();

export default {
  // Disable server-side rendering (https://go.nuxtjs.dev/ssr-mode)
  ssr: false,

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
    script: [
      // {src: 'https://cdnjs.cloudflare.com/ajax/libs/d3/5.15.0/d3.min.js'},
      // {src: 'https://cdnjs.cloudflare.com/ajax/libs/d3-tip/0.9.1/d3-tip.min.js'},
      // {src: 'https://cdn.jsdelivr.net/npm/d3-dag@0.3.4/dist/d3-dag.min.js'},
      {src: 'https://cdn.rawgit.com/eligrey/canvas-toBlob.js/f1a01896135ab378aa5c0118eadd81da55e698d8/canvas-toBlob.js'},
      {src: 'https://cdn.rawgit.com/eligrey/FileSaver.js/e9d941381475b5df8b7d7691013401e171014e89/FileSaver.min.js'}
    ],

    // Global CSS (https://go.nuxtjs.dev/config-css)
    css: []
  },
  env: {
    STRIPE_KEY: process.env.STRIPE_KEY,
    BASE_URL: process.env.BASE_URL,
    ECHO_PORT: process.env.ECHO_PORT,
  },
  // Plugins to run before rendering page (https://go.nuxtjs.dev/config-plugins)
  plugins: [
//    {src: '~/plugins/vue-good-table', ssr: false},
//    {src: '~/plugins/vuelidate.js', ssr: false},
//    {src: '~/plugins/vue-select.js', ssr: false},
//    {src: '~/plugins/v-calendar.js', ssr: false},
//    {src: '~/plugins/vuetimepiker.js', ssr: false},
    {src: '~/plugins/vue-fb-customer-chat.js', ssr: false},
//    {src: '~/plugins/vue-instantsearch.js', ssr: false},
    // {src: '~/plugins/echo.js', ssr: false},
  ],

  // Auto import components (https://go.nuxtjs.dev/config-components)
  components: true,

  transpile: ['vue-instantsearch', 'instantsearch.js/es'],
  // Modules for dev and build (recommended) (https://go.nuxtjs.dev/config-modules)
  buildModules: [
  //  '@nuxtjs/laravel-echo',
  //  'nuxt-content-algolia'
  ],

  hooks: {
    'content:file:beforeInsert': (content) => {
      const removeMd = require('remove-markdown');
      if (content.extension == 'md') {
        content.bodyPlainText = removeMd(content.text);
      }
    }
  },

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

  echo: {
    broadcaster: 'socket.io',
    host: `${process.env.HOSTNAME}:${process.env.ECHO_PORT}`,
  },

  // Modules (https://go.nuxtjs.dev/config-modules)
  modules: [
    // https://go.nuxtjs.dev/bootstrap
    '@nuxtjs/bulma',
    '@nuxtjs/axios',
    '@nuxtjs/auth',
    '@nuxt/content',
    '@nuxtjs/sitemap',
    'nuxt-socket-io',
    [
      'nuxt-fontawesome', {
      imports: [
        {
          set: '@fortawesome/free-solid-svg-icons',
          icons: ['fas']
        },
        {
          set: '@fortawesome/free-brands-svg-icons',
          icons: ['fab']
        },
        {
          set: "@fortawesome/free-regular-svg-icons",
          icons: ["far"]
        }
      ]
    }
    ],
    ['nuxt-stripe-module', {
      publishableKey: process.env.STRIPE_KEY,
    }],
    'nuxt-buefy',
    ['nuxt-buefy', { /* buefy options */}]
  ],

  axios: {
    baseURL: process.env.BASE_URL,
    credentials: true
  },
  auth: {
    redirect: {
      login: '/login',
      logout: '/',
      callback: '/login',
      home: '/dashboard'
    },
    strategies: {
      local: {
        endpoints: {
          login: {
            url: '/login', method: 'post', propertyName: false, withCredentials: true,
            headers: {
              'X-Requested-With': 'XMLHttpRequest',
              'Content-Type': 'application/json'
            }
          },
          logout: {url: '/logout', method: 'post'},
          user: {
            url: '/api/user', method: 'get', propertyName: false, withCredentials: true,
            headers: {
              'X-Requested-With': 'XMLHttpRequest',
              'Content-Type': 'application/json'
            }
          }
        },
        tokenRequired: false,
        tokenType: false
      }
    },
    localStorage: false
  },
  io: {
    // module options
    sockets: [{
      name: 'main',
      url: 'http://localhost:3000'
    }]
  },

  // Build Configuration (https://go.nuxtjs.dev/config-build)
  build: {
    filenames: {
      app: ({isDev}) => isDev ? '[name].js' : '[chunkhash].js',
      chunk: ({isDev}) => isDev ? '[name].js' : '[chunkhash].js',
      css: ({isDev}) => isDev ? '[name].css' : '[contenthash].css',
      img: ({isDev}) => isDev ? '[path][name].[ext]' : 'img/[hash:7].[ext]',
      font: ({isDev}) => isDev ? '[path][name].[ext]' : 'fonts/[hash:7].[ext]',
      video: ({isDev}) => isDev ? '[path][name].[ext]' : 'videos/[hash:7].[ext]'
    },
    postcss: {
      preset: {
        features: {
          customProperties: false
        }
      }
    },
    transpile: ['d3-dag']
  }
}
