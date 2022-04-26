<template>
  <div class="product-content">
    <div v-if="loading" class="loading"></div>
    <div v-else>
      <div v-if="Products.length">
        <div class="row g-0">
          <div class="col-lg-4">
            <div
              class="card border-right-0 rounded-start rounded-0 border-end-0"
              style="height: 700px"
            >
              <img
                :src="'/storage/product/' + Products[0].image"
                class="card-img-top"
                :alt="Products[0].title"
              />
              <div class="card-body">
                <h5 class="card-title">{{ Products[0].title }}</h5>
                <p class="card-text">
                  {{ Products[0].description }}
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="row g-0">
              <div
                class="col-md-4"
                v-for="(product, key) in Products"
                :key="key"
                v-if="key !== 0"
              >
                <div class="card rounded-0 border-end-0" style="height: 350px">
                  <img
                    :src="'/storage/product/' + product.image"
                    class="card-img-top"
                    :alt="product.title"
                  />
                  <div class="card-body">
                    <h5 class="card-title">{{ product.title }}</h5>
                    <p class="card-text">
                      {{ product.description }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div v-else>No Product Found</div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Catalog",
  props: ["categories"],
  data() {
    return {
      loading: true,
      Products: {},
    };
  },
  mounted() {
    this.getProducts();
  },
  methods: {
    getProducts() {
      axios
        .get("/api/product/byCategory/" + this.categories)
        .then((response) => {
          this.Products = response.data;
          this.loading = false;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style>
.product-content {
  width: calc(100% - 270px);
}
</style>
