<template>
  <div>
    <h3 class="text-center">Add Product</h3>
    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="addProduct">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" v-model="product.name" />
          </div>
          <div class="form-group">
            <label>Description</label>
            <input
              type="text"
              class="form-control"
              v-model="product.description"
            />
          </div>
          <div class="form-group">
            <label>Price</label>
            <input type="text" class="form-control" v-model="product.price" />
          </div>
          <div class="form-group">
            <label>Image</label>
            <input type="text" class="form-control" v-model="product.image" />
          </div>
          <div class="d-flex pb-4">
            <div
              class="form-check mr-4"
              v-for="category in categories"
              :key="category.id"
            >
              <input
                class="form-check-input"
                type="checkbox"
                :id="category.id"
                :value="category.id"
                v-model="product_categories"
              />
              <label
                class="form-check-label font-weight-bold"
                :for="category.id"
                >{{ category.name }}</label
              >
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Add Post</button>
        </form>
      </div>
      {{ product_categories }}
    </div>
  </div>
</template>
  
<script>
export default {
  data() {
    return {
      product: {},
      categories: [],
      product_categories: [],
    };
  },
  methods: {
    addProduct() {
      this.product.categories = this.product_categories;
      console.log(this.product)
      this.axios
        .post("product", this.product)
        .then(
          (response) => this.$router.push({ name: "home" })
          // console.log(response.data)
        )
        .catch((error) => console.log(error))
        .finally(() => (this.loading = false));
    },
    async getCategories() {
      await this.axios
        .get("categories")
        .then((response) => (this.categories = response.data))
        .catch((error) => console.log(error));
    },
  },

  beforeMount() {
    this.getCategories();
  },
};
</script>