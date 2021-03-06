const state = {
    user: {},
    rolePermissions: {},
};

const mutations = {
    setUser(state, data) {
        state.user = data;
    },
    setRolePermissions(state, data) {
        state.rolePermissions = data;
    },
};

const actions = {
    async getUser({ commit }) {
        await axios
            .get("/api/currentUser")
            .then((response) => {
                commit("setUser", response.data);
            })
            .catch((error) => {
                commit("setUser", {});
                console.log(error);
            });
    },
    async getRolePermissions({ commit }) {
        await axios
            .get("/api/rolePermissions")
            .then((response) => {
                commit("setRolePermissions", response.data);
            })
            .catch((error) => {
                commit("setRolePermissions", {});
                console.log(error);
            });
    },
    async loginUser({ commit }, user) {
        await axios
            .post("/api/login", user)
            .then((response) => {
                if (response.data.token) {
                    //save the token
                    localStorage.setItem("login_token", response.data.token);
                    window.location.href = "admin/dashboard";
                }
            })
            .catch((error) => {
                console.log(error);
            });
    },
};
const getters = {
    loggedIn: (state) => !!state.user.name,
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
};
