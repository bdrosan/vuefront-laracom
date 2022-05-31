<template>
  <div>
    <Header />
    <Navbar />
    <router-view />
    <Footer />
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import Footer from "./components/web/layouts/Footer.vue";
import Header from "./components/web/layouts/Header.vue";
import Navbar from "./components/web/layouts/Navbar.vue";

export default {
  components: { Header, Footer, Navbar },
  name: "App",

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
          window.location.href = "login";
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
  },
};
</script>
