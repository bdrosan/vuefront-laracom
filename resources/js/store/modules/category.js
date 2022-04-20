export default {
    namespaced: true,
    state: {
        single: {},
        paginate: [],
        all: [],
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
    },
    actions: {
        getAll({ commit }, id) {
            commit("loading", true);
            axios
                .get("/api/category/all/" + id) //return all. id is optional, if provided returns all except id
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
                .get("/api/category?page=" + page)
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
                .get("/api/category/26")
                .then((response) => {
                    commit("single", response.data);
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
        loading(state, data) {
            return (state.loading = data);
        },
    },
};
