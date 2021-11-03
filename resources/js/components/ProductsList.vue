 
  <template>
  <div>
    <h3 class="text-center">All Products</h3>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Description</th>
          <th>Price</th>
          <th>Image</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="product in products" :key="product.id">
          <td>{{ product.id }}</td>
          <td>{{ product.name }}</td>
          <td>{{ product.description }}</td>
          <td>{{ product.price }}</td>
          <td>{{ product.image }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template 

<script>
export default {
 data() {
    return {
      products: []
    }
  },
  methods: {
    getProducts() {
      this.axios
        .get("product", this.products)
        .then((response) => (this.products = response.data))
        .catch((error) => console.log(error))
        .finally(() => (this.loading = false));
    },
  },
  beforeMount() {
    this.getProducts();
  },
};
</script>
