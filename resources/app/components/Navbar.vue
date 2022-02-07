<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <RouterLink :to="{name: 'HomeScreen'}" class="navbar-brand" href="#">LoopIt</RouterLink>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
              aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        </ul>
        <a class="btn btn-sm btn-outline-secondary" href="/auth/logout">Logout</a>
      </div>
    </div>
  </nav>
</template>

<script>

export default {
  name: 'Navbar',
};
</script>

<style scoped>

</style>
