<template>
  <div v-if="hasPermission">
    <div>Dashboard logged in {{ loggedUser }}</div>
  </div>
  <div v-else>
    <div class="unauthorized">Unauthorized access</div>
  </div>
</template>

<script>
export default {
  name: "Dashboard",
  computed: {
    loggedUser() {
      return this.$store.state.auth.user;
    },
    hasPermission() {
      let permission = this.$store.state.auth.permission;

      //super user has all permissions
      if (permission == "super-admin") return true;

      //other user must have required permission
      if (typeof permission == "array") {
        if (permission.indexOf("access-dashboard")) return true;
      }

      return false;
    },
  },
};
</script>

<style scoped>
.unauthorized {
  position: absolute;
  inset: 0;
  background-color: #e4e4e4;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: x-large;
  color: #7e7e7e;
}
</style>
