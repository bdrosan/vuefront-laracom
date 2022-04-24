<template>
  <div>
    <div v-if="loading" class="loading"></div>
    <div class="d-flex gap-3" v-else>
      <div
        class="poster-content d-flex justify-content-center align-items-end"
        :style="bannerImage"
      >
        <div class="text-center">
          <div data-element="content">
            <h5><span style="color: #ffc000">Featured </span></h5>
            <h3 style="margin: 0">
              <span style="font-size: 32px; line-height: 32px; color: #ffffff"
                >Mi 11 Lite</span
              >
            </h3>
            <h4 style="font-weight: 300; margin: 0">
              <span style="font-size: 28px; line-height: 28px; color: #ffffff"
                >32GB Unlocked
              </span>
            </h4>
          </div>
          <button type="button" class="btn btn-primary mt-4">shop now</button>
        </div>
      </div>
      <div class="product-content" v-if="Products.length">
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
    </div>
  </div>
</template>

<script>
export default {
  name: "Catalog",
  props: ["categories", "banner"],
  data() {
    return {
      loading: true,
      Products: {},
      bannerImage: {
        "background-image": "url(" + "/storage/home/" + this.banner + ")",
      },
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
.poster-content {
  width: 270px;
  border-radius: 10px;
  height: 700px;
  padding-left: 15px;
  padding-right: 15px;
  padding-bottom: 120px;
  text-align: center;
}
.product-content {
  width: calc(100% - 270px);
}
</style>
