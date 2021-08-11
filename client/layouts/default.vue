<template>
  <div>
    <Nuxt />
  </div>
</template>
<script>
export default {
    methods: {
        async logout() {
          await this.$auth.logout();
        },
    }
}
</script>
<style>
@import '~/assets/css/bulma.css';
@import '~/assets/css/fontawesome.min.css';
</style>
