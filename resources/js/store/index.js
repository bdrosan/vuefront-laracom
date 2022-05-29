import Vue from "vue";
import Vuex from "vuex";
import auth from "./modules/auth";
import category from "./modules/category";
import product from "./modules/product";

Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        auth,
        category,
        product,
    },
});

export default store;
