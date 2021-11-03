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
            <input type="number" class="form-control" v-model="product.price" />
          </div>
          <div class="form-group">
            <label>Image</label>
            <input type="text" class="form-control" v-model="product.image" />
          </div>
          <button type="submit" class="btn btn-primary">Add Post</button>
        </form>
      </div>
    </div>
  </div>
</template>
  
<script>
export default {
  data() {
    return {
      product: [
        {
          name: "Blabla",
          description: "Blafladfasdf",
          price: 12.33,
          image: "https:sdfs",
        },
      ],
    };
  },
  methods: {
    addProduct() {
      this.axios
        .post("product", this.product)
        .then(
          (response) => this.$router.push({ name: "home" })
          // console.log(response.data)
        )
        .catch((error) => console.log(error))
        .finally(() => (this.loading = false));
    },
  },
};
</script>