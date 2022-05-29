<template>
  <div class="not-found">404 | Not Found</div>
</template>

<script>
export default {
  name: "NotFound",
};
</script>

<style scoped>
.not-found {
  position: fixed;
  inset: 0;
  background-color: #e4e4e4;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: x-large;
  color: #7e7e7e;
  z-index: 10000;
}
</style>
