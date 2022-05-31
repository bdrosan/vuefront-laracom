<template>
  <div class="my-5">
    <div class="card card-body m-auto" style="max-width: 480px">
      <form @submit.prevent="login">
        <h3>Login</h3>
        <p>If you have an account, sign in with your email address.</p>
        <div class="alert alert-danger" v-if="validation">
          {{ validation }}
        </div>
        <div class="alert alert-danger" v-else-if="errorMessage">
          {{ errorMessage }}
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">
            <i class="bi bi-person fs-5"></i>
          </span>
          <input
            type="email"
            class="form-control"
            placeholder="Email"
            v-model="user.email"
          />
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">
            <i class="bi bi-key fs-5"></i>
          </span>
          <input
            type="password"
            class="form-control"
            placeholder="Password"
            v-model="user.password"
          />
        </div>
        <div class="mb-3"></div>
        <div class="mb-3 d-flex justify-content-between">
          <button class="btn btn-primary" type="submit">
            <i class="bi bi-box-arrow-in-right"></i>
            <span>Login</span></button
          ><a href="#">Forgot your password?</a>
        </div>
        <hr />
        If you do not have an account, please
        <router-link to="/register">Sign Up.</router-link>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "Login",
  data() {
    return {
      user: {
        email: "",
        password: "",
      },
      errorMessage: "",
      validation: null,
    };
  },
  methods: {
    login() {
      this.$store.dispatch("auth/loginUser", this.user);
    },
  },
};
</script>

<style>
</style>
