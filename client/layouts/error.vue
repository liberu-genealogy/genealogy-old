<template>
  <div>
    <nav class="navbar is-fixed-top box-shadow-y">
        <div class="column is-12 px-3 navbar-brand is-flex ai--c jc--fs">
            <a href="index.html">
                <img src="~assets/images/main-logo.svg" alt="" width="160px">
            </a>
        </div>
    </nav>

    <div class="container is-flex fd--c ai--c jc--c py-6">
        <div class="column is-6 my-6">
            <div class="card has-background-white has-text-centered is-flex fd--c ai--c jc--c px-6 py-6">
                <div class="is-size-1 has-text-black has-text-weight-bold">
                    403
                </div>
                <div class="is-size-5 has-text-black has-text-weight-bold mt-4">
                    Sorry! You don't have permission to access this page!
                </div>
                <div class="is-size-7 has-text-dark mt-3">
                    The link you followed is either outdated, inacurate, or the server<br> has been instrucred not to let you have it.
                </div>
                <div class="is-flex jc--fe mt-4">
                    <NuxtLink to="/"
                        class="is-flex button is-size-7 is-uppercase has-text-white has-background-primary has-text-weight-medium is-light">Back to Homepage</NuxtLink>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
  export default {
    layout: 'error' // you can set a custom layout for the error page
  }
</script>
<style scoped="">
    @import '~/assets/css/bulma.css';
    @import '~/assets/css/admin.css';
    @import '~/assets/css/fontawesome.min.css';
</style>