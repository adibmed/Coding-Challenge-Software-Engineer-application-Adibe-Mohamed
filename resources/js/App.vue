<template>
  <div class="container">
    <div class="text-center" style="margin: 20px 0px 20px 0px">
      <span class="text-secondary"
        >Software Engineer - Coding challenge</span
      >
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="navbar-nav">
        <router-link :to="{ name: 'home' }" class="nav-item nav-link"
          >Home</router-link
        >
        <router-link :to="{ name: 'add' }" class="nav-item nav-link"
          >Add Post</router-link
        >
      </div>
    </nav>
    <br />
    <router-view></router-view>
  </div>
</template>
  
<script>
export default {};
</script>