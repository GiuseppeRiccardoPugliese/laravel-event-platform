<script>
import ApiContent from './components/ApiContent.vue'

export default {
  components: {
    ApiContent,
  },
}
</script>

<template>

<nav class="navbar">
    <div class="container">
      <router-link class="nav-link" :to="{ name: 'home' }">Home</router-link>
      <router-link class="nav-link" :to="{ name: 'events' }">Events</router-link>
      <router-link class="nav-link" :to="{ name: 'tags' }">Tags</router-link>
      <router-link class="nav-link" :to="{ name: 'about' }">About</router-link>
    </div>
  </nav>
  <router-view></router-view>
</template>

<style scoped>

.navbar {
  background-color: #333;
  color: white;
  padding: 10px 0;
}

.container {
  display: flex;
  justify-content: space-between;
}

.navbar-brand,
.nav-link {
  color: white;
  text-decoration: none;
  padding: 5px 10px;
}

.nav-link:hover {
  background-color: #555;
}
</style>
