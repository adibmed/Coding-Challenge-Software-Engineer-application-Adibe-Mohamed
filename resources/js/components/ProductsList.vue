<template>
    <div>
        <h3 class="text-center pb-5">All Products</h3>
        <div v-if="!products"><center>Nothing to show</center></div>
        <div v-else>
            <div class="pb-2 float-right d-flex">
                <div>
                    <label for="category">filer by </label>
                    <select
                        @change="getProducts()"
                        name=""
                        id="category"
                        class="p-2"
                        v-model="category"
                    >
                        <option value="">All</option>
                        <option
                            v-for="category in categories"
                            :value="category.id"
                            :key="category.id"
                        >
                            {{ category.name }}
                        </option>
                    </select>
                </div>
                <div class="pl-4">
                    <label for="sort">sort by </label>

                    <select
                        @change="getProducts()"
                        name=""
                        id="sort"
                        class="p-2"
                        v-model="sort"
                    >
                        <option value="name">Name</option>
                        <option value="price">Price</option>
                    </select>
                </div>
            </div>
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
                        <td>
                            <div v-if="product.image">
                                <a
                                    :href="product.image"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    ><img
                                        :src="product.image"
                                        height="50"
                                        alt=""
                                /></a>
                            </div>
                            <div v-else>none</div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <button
                            @click="loadMore(-1)"
                            class="page-link"
                            :disabled="!canLoadPrev"
                            :class="!canLoadPrev ? 'bg-danger' : ''"
                            aria-label="Previous"
                        >
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </button>
                    </li>
                    <li class="page-item">
                        <span class="page-link">{{ currentPage }}</span>
                    </li>
                    <li class="page-item">
                        <button
                            @click="loadMore(1)"
                            class="page-link"
                            :disabled="!canLoadNext"
                            :class="!canLoadNext ? 'bg-danger' : ''"
                            aria-label="Next"
                        >
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            products: [],
            categories: [],
            currentPage: 0,
            sort: "name",
            category: 1,
            isLoading: false,
            canLoadNext: true,
            canLoadPrev: true,
            totalPages: 1,
        };
    },

    methods: {
        loadMore(inc) {
            if (inc === -1) {
                this.canLoadPrev = this.currentPage > 0;
                if (this.canLoadPrev) {
                    this.currentPage += inc;
                    this.canLoadNext = true;
                    this.getProducts();
                } else return;
            }
            if (inc === 1) {
                this.canLoadNext = this.currentPage < this.totalPages;
                if (this.canLoadNext) {
                    this.currentPage += inc;
                    this.canLoadPrev = true;
                    this.getProducts();
                } else return;
            }
        },

        async getProducts() {
            this.isLoading = true;

            let params = {};
            if (this.currentPage) params.page = this.currentPage;
            if (this.category) params.category = this.category;
            if (this.sort) params.sort = this.sort;
            await this.axios
                .get("product", {
                    params,
                })
                .then((response) => {
                    this.products = [];
                    this.products = response.data.data.data;
                    this.totalPages = response.data.data.last_page;
                })
                .catch((error) => console.log(error))
                .finally(() => (this.loading = false));
        },

        async getCategories() {
            await this.axios
                .get("categories")
                .then((response) => (this.categories = response.data.data))
                .catch((error) => console.log(error));
        },
    },
    beforeMount() {
        this.getCategories();
        this.getProducts();
    },
};
</script>
