<template>
  <div>
    <carousel
      :perPageCustom="[
        [480, 2],
        [768, 3],
        [992, 4],
        [1200, 6],
      ]"
    >
      <slide :key="Category.id" v-for="Category in Categories">
        <a href="#">
          <div class="card border-0">
            <img
              :src="thumbLink(Category.image)"
              class="card-img-top px-2"
              :alt="Category.name"
            />
            <div class="card-body text-center fs-6">
              {{ Category.name }}
            </div>
          </div>
        </a>
      </slide>
    </carousel>
  </div>
</template>

<script>
import { Carousel, Slide } from "vue-carousel";
export default {
  name: "category",
  components: { Carousel, Slide },

  mounted() {
    this.$store.dispatch("category/getAll");
  },
  computed: {
    Categories() {
      let categories = this.$store.state.category.all;
      //filter only featured categories
      return categories.filter((categories) => categories.featured == 1);
    },
  },
  methods: {
    thumbLink: function (name) {
      let path = "/storage/category/thumbs/";
      return name ? path + name : path + "no-image.png";
    },
  },
};
</script>
