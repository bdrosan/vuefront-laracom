<template>
  <div>
    <div class="mb-5 bg-white py-2">
      <div class="container-fluid">
        <div class="d-flex justify-content-between">
          <h5>Category</h5>
          <div>
            <router-link
              to="/admin/category/create"
              class="btn btn-primary btn-sm"
            >
              Add Category
            </router-link>
            <router-link
              to="/admin/category/createbulk"
              class="btn btn-primary btn-sm"
            >
              Add Bulk Category
            </router-link>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="card card-body border-0">
        <div>
          <div v-if="this.$store.state.category.loading" class="loading" />
          <div v-else>
            <div v-if="Categories">
              <div class="dropdown mb-3">
                <button
                  class="btn btn-info btn-sm dropdown-toggle"
                  :disabled="!isSelected"
                  type="button"
                  id="dropdownMenuButton"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Action
                </button>
                <div class="dropdown-menu">
                  <button
                    @click="bulkDelete(selected)"
                    type="button"
                    class="dropdown-item text-danger py-1"
                  >
                    <i class="bi bi-trash me-1"></i>
                    Delete
                  </button>
                  <button
                    @click="ChangeStatus(selected, 1)"
                    type="button"
                    class="dropdown-item text-success py-1"
                  >
                    <i class="bi bi-toggle-on me-1"></i>
                    Active
                  </button>
                  <button
                    @click="ChangeStatus(selected, 0)"
                    type="button"
                    class="dropdown-item py-1"
                  >
                    <i class="bi bi-toggle-off me-1"></i>
                    Inactive
                  </button>
                </div>
              </div>
            </div>
            <div class="table-responsive" v-if="Categories">
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th>
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          :disabled="!Categories"
                          type="checkbox"
                          @click="selectAll()"
                          v-model="selectedAll"
                        />
                      </div>
                    </th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Parent Category</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr :key="Category.id" v-for="Category in Categories">
                    <td>
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          type="checkbox"
                          :value="Category.id"
                          v-model="selected"
                        />
                      </div>
                    </td>
                    <td>
                      <img
                        :src="fileLink(Category.image)"
                        alt=""
                        height="40"
                        class="me-2"
                      />
                      {{ Category.name }}
                    </td>
                    <td>
                      {{ Category.parent ? Category.parent.name : null }}
                    </td>
                    <td>
                      <span class="badge" :class="statusColor(Category.status)">
                        {{ statusName(Category.status) }}</span
                      >
                    </td>
                    <td>
                      <div class="dropdown">
                        <button
                          type="button"
                          class="btn btn-outline-secondary btn-sm"
                          data-bs-toggle="dropdown"
                          aria-expanded="false"
                        >
                          <i class="bi bi-three-dots"></i>
                        </button>
                        <div class="dropdown-menu" style="">
                          <router-link
                            :to="`/admin/category/${Category.id}`"
                            class="dropdown-item text-primary"
                          >
                            <i class="bi bi-eye me-1"></i>
                            View details
                          </router-link>
                          <router-link
                            :to="`/admin/category/${Category.id}/edit`"
                            class="dropdown-item text-info"
                          >
                            <i class="bi bi-pencil-square me-1"></i> Edit
                          </router-link>
                          <button
                            type="submit"
                            class="dropdown-item text-danger"
                            @click.prevent="deleteItem(Category.id)"
                          >
                            <i class="bi bi-trash me-1"></i>
                            Delete
                          </button>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div v-else>
              <h4 class="text-center text-danger">Data Not Found</h4>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div v-if="Categories">
          <paginate
            v-model="current_page"
            :page-count="total"
            :click-handler="paginationHandler"
            :prev-text="'&laquo;'"
            :prev-class="'page-item prev'"
            :prev-link-class="'page-link'"
            :next-text="'&raquo;'"
            :next-class="'page-item next'"
            :next-link-class="'page-link'"
            :container-class="'pagination'"
            :page-class="'page-item'"
            :page-link-class="'page-link'"
          />
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
</template>

<script>
export default {
  name: "category",
  data() {
    return {
      total: 1,
      current_page: 1,
      selected: [],
      selectedAll: false,
      isSelected: false,
    };
  },

  mounted() {
    this.$store.dispatch("category/getPaginate", 1); // default page no 1
  },
  watch: {
    selected: function (selected) {
      this.isSelected = selected.length > 0;
      this.selectedAll = selected.length == this.Categories.length;
    },
  },
  computed: {
    Categories() {
      let paginate = this.$store.state.category.paginate;
      this.total = paginate.last_page ? paginate.last_page : 1;
      return paginate.data;
    },
  },
  methods: {
    paginationHandler: function (pageNum) {
      this.selected = [];
      this.$store.dispatch("category/getPaginate", pageNum);
    },
    statusName(status) {
      return status == 1 ? "Active" : "Inactive";
    },
    statusColor(status) {
      return status == 1 ? "text-bg-primary" : "text-bg-secondary";
    },
    fileLink: function (name) {
      return name
        ? "/storage/category/thumbs/" + name
        : "/storage/category/thumbs/no-image.png";
    },
    deleteItem(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          axios
            .delete("/api/category/" + id)
            .then(() => {
              this.paginationHandler(this.current_page);
              Swal.fire("Deleted!", "Your file has been deleted.", "success");
            })
            .catch((error) => {
              console.log(error);
            });
        }
      });
    },
    selectAll: function () {
      if (event.target.checked === false) {
        this.selected = [];
      } else {
        this.Categories.forEach((Category) => {
          if (this.selected.indexOf(Category.id)) {
            this.selected.push(Category.id);
          }
        });
      }
    },

    bulkDelete: function (selected) {
      axios
        .post("/api/category/bulkdelete", { ids: selected })
        .then((response) => {
          Swal.fire(
            "Deleted!",
            response.data + " " + "Category has been deleted Successfully !.",
            "success"
          );
          //this.selected = [];
          //this.selectAll = false;
          //this.isSelected = false;
          this.paginationHandler(this.current_page);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    ChangeStatus: function (selected, status) {
      let msg = status === 1 ? "Active" : "Inactive";
      axios
        .post("/api/category/changestatus", {
          ids: selected,
          status: status,
        })
        .then((response) => {
          Swal.fire(response.data + "  Category has been  Successfully " + msg);
          this.$store.dispatch("category/getPaginate", 1);
          this.selected = [];
        });
    },
  },
};
</script>













<style>
</style>

