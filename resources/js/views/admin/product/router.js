import AddProduct from "./Create.vue";
import BulkCreate from "./BulkCreate.vue";
import ViewProduct from "./View.vue";
import EditProduct from "./Edit.vue";
import Index from "./Index.vue";

const routes = [
    { path: "/admin/Product", component: Index, meta: { requiresAuth: true } },
    {
        path: "/admin/Product/create",
        component: AddProduct,
        meta: { requiresAuth: true },
    },
    {
        path: "/admin/Product/createbulk",
        component: BulkCreate,
        meta: { requiresAuth: true },
    },
    {
        path: "/admin/Product/:id",
        component: ViewProduct,
        meta: { requiresAuth: true },
    },
    {
        path: "/admin/Product/:id/edit",
        component: EditProduct,
        meta: { requiresAuth: true },
    },
];

export default routes;
