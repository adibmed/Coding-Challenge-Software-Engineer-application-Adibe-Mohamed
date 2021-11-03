import ProductsList  from './components/ProductsList.vue';
import AddProduct from './components/AddProduct.vue'; 
  
export const routes = [
    {
        name: 'home',
        path: '/',
        component: ProductsList
    },
    {
        name: 'add',
        path: '/add',
        component: AddProduct
    }
];