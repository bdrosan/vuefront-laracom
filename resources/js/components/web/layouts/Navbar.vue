<template>
  <div>
    <div class="bg-warning">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <nav class="navbar navbar-light">
              <button
                class="navbar-toggler text-black border-0 px-0"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarToggleExternalContent"
                aria-controls="navbarToggleExternalContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span> All Departments
              </button>
            </nav>
          </div>
          <div class="col-md-9 ml-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-warning">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <router-link to="/" class="nav-link ps-0" exact="">
                    Home
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/about" class="nav-link">About</router-link>
                </li>
                <li class="nav-item">
                  <a href="/admin/dashboard" class="nav-link" v-if="loggedIn">
                    Admin
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <div
      class="collapse"
      id="navbarToggleExternalContent"
      style="position: absolute; z-index: 3"
    >
      <div class="container-fluid">
        <ul class="list-group">
          <li class="list-group-item">
            <a href="javascript:void(0)">
              <i class="bi-laptop"></i> Laptops & Computers
            </a>
          </li>
          <li class="list-group-item"><i class="bi-phone"></i> Smart Phone</li>
          <li class="list-group-item">
            <i class="bi-camera"></i> Cameras & Photos
          </li>
          <li class="list-group-item"><i class="bi-controller"></i> Gaming</li>
          <li class="list-group-item"><i class="bi-tv"></i> TVs & Audios</li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  name: "Navbar",
  computed: {
    ...mapGetters({
      loggedIn: "auth/loggedIn",
    }),
    currentUser: {
      get() {
        return this.$store.state.auth.user;
      },
    },
  },
};
</script>

<style>
</style>
