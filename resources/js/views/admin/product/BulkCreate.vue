<template>
  <div>
    <div class="mb-5 bg-white py-2">
      <div class="container-fluid">
        <div class="d-flex">
          <h5>Create Category</h5>
          <div class="ms-3">
            <router-link to="/admin/category" class="btn btn-secondary btn-sm">
              <i class="bi bi-arrow-90deg-left"></i>
              Back to category
            </router-link>
            <router-link
              to="/admin/category/create"
              class="btn btn-primary btn-sm"
            >
              Add Single Category
            </router-link>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <!-- /.card-header -->
      <div class="card card-body">
        <form
          @submit.prevent="addCategory()"
          method="POST"
          enctype="multipart/form-data"
        >
          <div class="form-row">
            <div class="col-md-8 mb-3">
              <label for="validationDefault01">Category Name</label>
              <textarea
                type="text"
                class="form-control"
                id="validationDefault01"
                placeholder='Category names (separated by comma ",")'
                v-model="form.name"
                name="name"
                required
                :class="{ 'is-invalid': form.errors.get('name') }"
              />
              <div
                v-if="form.errors.has('name')"
                v-html="form.errors.get('name')"
              />
            </div>
          </div>
          <div class="mt-3">
            <button type="submit" :disabled="form.busy" class="btn btn-primary">
              Save Category
            </button>
            <router-link to="/admin/category" class="btn btn-default">
              Cancel
            </router-link>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import Form from "vform";
export default {
  name: "createBulk",
  data: () => ({
    form: new Form({
      name: null,
    }),
  }),
  methods: {
    addCategory: function () {
      this.form
        .post("/api/category/bulkcreate")
        .then((response) => {
          Swal.fire({
            position: "top",
            icon: "success",
            title: "Your work has been saved",
            showConfirmButton: false,
            timer: 1500,
          });
          this.form.name = null;
          this.$router.push("/admin/category");
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>


<style>
</style>

