<template>
<div class="container">
  <div class="alert alert-danger text-center" role="alert">
    404 Page not found
    <br>
    <RouterLink :to="{name: 'HomeScreen'}" class="btn btn-outline-primary">Go Home</RouterLink>
  </div>
</div>
</template>

<script>
export default {
  name: 'NotFoundScreen',
};
</script>

<style scoped>

</style>
