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
                <div
                  class="card rounded-0 border-end-0 catalog"
                  style="height: 350px"
                >
                  <div class="m-2">
                    <span class="badge bg-warning">-7%</span>
                  </div>

                  <a href="#" class="m-auto">
                    <img
                      :src="'/storage/product/' + product.image"
                      style="max-height: 140px"
                      :alt="product.title"
                    />
                  </a>

                  <div class="card-body pt-1">
                    <div class="actions">
                      <div class="d-flex justify-content-evenly mb-1">
                        <button
                          class="
                            btn btn-outline-warning
                            rounded-circle
                            border-0
                          "
                          title="Add to cart"
                        >
                          <i class="bi bi-cart-plus fs-4"></i>
                        </button>
                        <button
                          class="
                            btn btn-outline-warning
                            rounded-circle
                            border-0
                          "
                          title="Add to favourite"
                        >
                          <i class="bi bi-heart fs-4"></i>
                        </button>
                        <button
                          class="
                            btn btn-outline-warning
                            rounded-circle
                            border-0
                          "
                          title="Add to compare"
                        >
                          <i class="bi bi-input-cursor fs-4"></i>
                        </button>
                        <button
                          class="
                            btn btn-outline-warning
                            rounded-circle
                            border-0
                          "
                          title="Quick View"
                        >
                          <i class="bi bi-eye fs-4"></i>
                        </button>
                      </div>
                    </div>
                    <h6 class="card-title">
                      <a href="#">{{ product.title }}</a>
                    </h6>
                    <div class="card-text">
                      <div class="price">${{ product.price }}</div>
                      <div class="rating text-warning">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star"></i>
                      </div>
                    </div>
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

.actions {
  position: relative;
  opacity: 0;
}
.catalog:hover .actions {
  opacity: 1;
  animation: slideup 0.6s;
}
@keyframes slideup {
  from {
    bottom: -50px;
    opacity: 0;
  }
  to {
    bottom: 0;
    opacity: 1;
  }
}
.card-title {
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
}
</style>
