<template>
  <div class="bg-white">
    <div class="bg-secondary p-1 text-light text-center">announcement</div>
    <div class="container-fluid d-sm-flex justify-content-between py-3 d-none">
      <div>Free Shipping on Orders $50+</div>
      <div class="d-flex gap-4">
        <a href="javascript:void(0)">Store Locator</a>
        <a href="javascript:void(0)">Track Your Order</a>
        <div class="dropdown">
          <a
            class="btn btn-default p-0 dropdown-toggle"
            href="javascript:void(0)"
            role="button"
            id="dropdownMenuLink"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            USD - US Dollar
          </a>

          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li>
              <a class="dropdown-item" href="javascript:void(0)">BDT - Taka</a>
            </li>
            <li>
              <a class="dropdown-item" href="javascript:void(0)">EUR - Euro</a>
            </li>
          </ul>
        </div>
        <div class="dropdown">
          <a
            class="btn btn-default p-0 dropdown-toggle"
            href="javascript:void(0)"
            role="button"
            id="dropdownMenuLink"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            English
          </a>

          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li>
              <a class="dropdown-item" href="javascript:void(0)">Bangla</a>
            </li>
            <li>
              <a class="dropdown-item" href="javascript:void(0)">Arabic</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container-fluid py-3">
      <div class="row">
        <div class="col-md-2 d-flex justify-content-between">
          <router-link to="/" class="nav-link ps-0" exact="">
            <img src="/logo.png" alt="logo" width="150" />
          </router-link>

          <a href="javascript:void(0)" class="d-sm-none">
            <i class="bi-cart fs-1"></i>
            <div class="d-inline-flex flex-column-reverse align-items-center">
              <span>Cart</span>
              <span class="badge rounded-pill bg-danger" style="width: 2.7rem">
                0
              </span>
            </div>
          </a>
        </div>
        <div class="col-md-5">
          <div class="input-group mb-3">
            <input
              type="text"
              class="form-control p-2"
              placeholder="Search the entire store"
              aria-label="Search the entire store"
              aria-describedby="button-addon2"
            />
            <button class="btn btn-secondary" type="button" id="button-addon2">
              Search
            </button>
          </div>
        </div>
        <div class="col-md-5 d-none d-sm-flex justify-content-end gap-3">
          <a href="tel:+880123456789" class="d-flex gap-2">
            <div>
              <i class="bi bi-telephone-outbound fs-1"></i>
            </div>
            <div>
              Call us 24/7<br />
              <span class="text-danger fw-bold">(+88) 0123456789</span>
            </div>
          </a>
          <a href="javascript:void(0)">
            <i class="bi-cart fs-1"></i>
            <div class="d-inline-flex flex-column-reverse align-items-center">
              <span>Cart</span>
              <span class="badge rounded-pill bg-danger" style="width: 2.7rem">
                0
              </span>
            </div>
          </a>
          <div class="position-relative d-flex align-items-center">
            <a href="#">
              <i class="bi-heart fs-2"></i>
              <span
                class="position-absolute badge rounded-pill bg-danger"
                style="left: 80%"
              >
                0
                <span class="visually-hidden">unread messages</span>
              </span>
            </a>
          </div>
          <a href="#">
            <i class="bi-person fs-1"></i>
            <div class="d-inline-flex flex-column-reverse fw-bold">
              <span>Register </span>
              <span>Sign in/</span>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Header",
};
</script>

<style>
</style>
