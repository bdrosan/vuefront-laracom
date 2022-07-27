<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarTogglerDemo01"
          aria-controls="navbarTogglerDemo01"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <router-link to="/admin" class="navbar-brand">
            Vuefront Laracom
          </router-link>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <router-link to="/admin/dashboard" class="nav-link">
                Dashboard
              </router-link>
            </li>
            <li class="nav-item">
              <router-link to="/admin/category" class="nav-link">
                Category
              </router-link>
            </li>
            <li class="nav-item">
              <router-link to="/admin/product" class="nav-link">
                Product
              </router-link>
            </li>
          </ul>
          <ul class="navbar-nav d-flex" v-if="loggedIn">
            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
              <a
                class="nav-link dropdown-toggle hide-arrow"
                href="javascript:void(0);"
                data-bs-toggle="dropdown"
              >
                <img
                  src="https://cdn.iconscout.com/icon/free/png-256/avatar-370-456322.png"
                  alt=""
                  class="rounded-circle"
                  height="30"
                />
              </a>
              <ul class="dropdown-menu dropdown-menu-end border-0 shadow">
                <li>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                        <div class="avatar avatar-online">
                          <img
                            src="https://cdn.iconscout.com/icon/free/png-256/avatar-370-456322.png"
                            alt=""
                            class="rounded-circle"
                            height="40"
                          />
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <span class="fw-semibold d-block">{{
                          currentUser.name
                        }}</span>
                        <small class="text-muted">
                          {{
                            rolePermissions.role
                              ? rolePermissions.role[0]
                              : null
                          }}
                        </small>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <div class="dropdown-divider"></div>
                </li>
                <li>
                  <a class="dropdown-item" href="#">
                    <i class="bx bx-user me-2"></i>
                    <span class="align-middle">My Profile</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">
                    <i class="bx bx-cog me-2"></i>
                    <span class="align-middle">Settings</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">
                    <span class="d-flex align-items-center align-middle">
                      <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                      <span class="flex-grow-1 align-middle">Billing</span>
                      <span
                        class="
                          flex-shrink-0
                          badge badge-center
                          rounded-pill
                          bg-danger
                          w-px-20
                          h-px-20
                        "
                        >4</span
                      >
                    </span>
                  </a>
                </li>
                <li>
                  <div class="dropdown-divider"></div>
                </li>
                <li>
                  <a class="dropdown-item" href="#logout" @click="logout">
                    <i class="bx bx-power-off me-2"></i>
                    <span class="align-middle">Log Out</span>
                  </a>
                </li>
              </ul>
            </li>
            <!--/ User -->
          </ul>
        </div>
      </div>
    </nav>
    <router-view />

    <footer class="content-footer footer bg-footer-theme">
      <div
        class="
          container-xxl
          d-flex
          flex-wrap
          justify-content-between
          py-2
          flex-md-row flex-column
        "
      >
        <div class="mb-2 mb-md-0">
          © {{ new Date().getFullYear() }} Vuefront-laravel
        </div>
        <div>
          <a
            href="https://themeselection.com/license/"
            class="footer-link me-4"
            target="_blank"
            >License</a
          >
          <a
            href="https://themeselection.com/"
            target="_blank"
            class="footer-link me-4"
            >More Themes</a
          >

          <a
            href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
            target="_blank"
            class="footer-link me-4"
            >Documentation</a
          >

          <a
            href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
            target="_blank"
            class="footer-link me-4"
            >Support</a
          >
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  name: "App",
  computed: {
    ...mapGetters({
      loggedIn: "auth/loggedIn",
    }),

    currentUser: {
      get() {
        return this.$store.state.auth.user;
      },
    },
    rolePermissions: {
      get() {
        return this.$store.state.auth.rolePermissions;
      },
    },
  },
  methods: {
    logout() {
      axios
        .post("/api/logout")
        .then((response) => {
          //delete localstorage
          localStorage.removeItem("login_token");
          //delete authorization
          delete axios.defaults.headers.common["Authorization"];
          //empty user
          this.$store.state.auth.user = null;
          this.$store.state.auth.token = null;
          //redirect to login
          window.location.href = "/login";
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  created() {
    axios.defaults.headers.common[
      "Authorization"
    ] = `Bearer ${localStorage.getItem("login_token")}`;
    this.$store.dispatch("auth/getUser");
    this.$store.dispatch("auth/getRolePermissions");
  },
};
</script>
