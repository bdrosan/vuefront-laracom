export default {
    namespaced: true,
    state: {
        single: {},
        paginate: [],
        all: [],
        byCategory: [],
        loading: false,
    },
    getters: {
        single(state) {
            return state.single;
        },
        paginate(state) {
            return state.paginate;
        },
        all(state) {
            return state.all;
        },
        byCategory(state) {
            return state.byCategory;
        },
    },
    actions: {
        getAll({ commit }, id) {
            commit("loading", true);
            axios
                .get("/api/product/all/" + id) //return all. id is optional, if provided returns all except id
                .then((response) => {
                    commit("all", response.data);
                    commit("loading", false);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getPaginate({ commit }, page) {
            commit("loading", true);
            axios
                .get("/api/product?page=" + page)
                .then((response) => {
                    commit("paginate", response.data);
                    commit("loading", false);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getSingle({ commit }, id) {
            commit("loading", true);
            axios
                .get("/api/product/" + id)
                .then((response) => {
                    commit("single", response.data);
                    commit("loading", false);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        byCategory({ commit }, category) {
            commit("loading", true);
            axios
                .get("/api/product/byCategory/" + category)
                .then((response) => {
                    commit("byCategory", response.data);
                    commit("loading", false);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
    mutations: {
        single(state, data) {
            return (state.single = data);
        },
        paginate(state, data) {
            return (state.paginate = data);
        },
        all(state, data) {
            return (state.all = data);
        },
        byCategory(state, data) {
            return (state.byCategory = data);
        },
        loading(state, data) {
            return (state.loading = data);
        },
    },
};
