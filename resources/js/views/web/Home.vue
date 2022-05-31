<template>
  <div>
    <slider />
    <section class="bg-white py-5" id="top-categories">
      <div class="container-fluid">
        <h2 class="mb-4">Categories On This Month</h2>
        <top-categories />
      </div>
    </section>
    <section id="banner-3" class="py-5">
      <div class="container-fluid">
        <div class="row g-4">
          <div class="col-lg-4">
            <div
              class="banner-3-item"
              style="background-image: url('storage/home/banner11-min.jpg')"
            >
              <div data-element="content">
                <h3 style="margin: 0">
                  <span style="font-size: 32px; line-height: 1">
                    Nikon RX10
                  </span>
                </h3>
                <h3 style="font-weight: 300">
                  <span style="font-size: 28px; line-height: 1">
                    32GB Unlocked
                  </span>
                </h3>
                <p style="margin-bottom: 20px">
                  <span style="color: #333e48">4GB RAM | 64GB ROM | 20MP</span>
                </p>
                <p class="text-price mb-0">
                  <span style="color: #333e48">
                    <span style="font-size: 18px">now at</span>
                    <span style="font-size: 42px; line-height: 42px">
                      <strong><em>$</em>749 </strong>
                    </span>
                  </span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div
              class="banner-3-item"
              style="background-image: url('storage/home/banner12-min.jpg')"
            >
              <div data-element="content">
                <h3 style="margin-bottom: 30px">
                  <span style="font-size: 30px; line-height: 1; color: #ffffff"
                    >Galaxy <br />Wireless <br />Earbuds</span
                  >
                </h3>
                <p class="text-price mb-0">
                  <span style="color: #ffffff"
                    ><span style="font-size: 18px">now at</span
                    ><span style="font-size: 42px; line-height: 42px"
                      ><strong><em>$</em>79 </strong></span
                    ></span
                  >
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div
              class="banner-3-item"
              style="background-image: url('storage/home/banner13-min.jpg')"
            >
              <div data-element="content">
                <h3 style="margin: 0">
                  <span style="font-size: 28px; line-height: 1; color: #ffffff"
                    >Nikon RX10</span
                  >
                </h3>
                <h3 style="font-weight: 300">
                  <span style="font-size: 28px; line-height: 1; color: #ffffff"
                    >32GB Unlocked</span
                  >
                </h3>
                <p style="margin-bottom: 20px">
                  <span style="color: #ffffff"
                    >Just
                    <span style="color: #ffe100"
                      ><strong>$159.99</strong></span
                    ></span
                  >
                </p>
                <p style="margin: 0">
                  <span style="color: #ffffff; font-size: 16px"
                    ><strong>Hear the music.</strong></span
                  >
                </p>
                <p style="margin: 0">
                  <span style="color: #ffffff; font-size: 16px"
                    >Not the noise.</span
                  >
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="catalog-1" class="py-5">
      <div class="container-fluid">
        <h4>Smartphone & Tablet</h4>
        <div class="d-flex gap-3">
          <div
            class="poster-content d-flex justify-content-center align-items-end"
            style="
              background-image: url('/storage/home/cate11-min.jpg');
              padding: 120px 15px;
            "
          >
            <div class="text-center">
              <div data-element="content">
                <h5><span style="color: #ffc000">Featured </span></h5>
                <h3 style="margin: 0">
                  <span
                    style="font-size: 32px; line-height: 32px; color: #ffffff"
                    >Mi 11 Lite</span
                  >
                </h3>
                <h4 style="font-weight: 300; margin: 0">
                  <span
                    style="font-size: 28px; line-height: 28px; color: #ffffff"
                    >32GB Unlocked
                  </span>
                </h4>
              </div>
              <button type="button" class="btn btn-primary mt-4">
                Shop now
              </button>
            </div>
          </div>
          <catalog :categories="[27]" />
        </div>
      </div>
    </section>
    <section id="banner-full" class="py-5">
      <div class="container-fluid">
        <div class="banner-full">
          <h3 style="margin-bottom: 0; margin-top: 20px">
            <span style="font-size: 36px; line-height: 1"
              >Xbox One S 750GB</span
            >
          </h3>
          <h3 style="margin-bottom: 30px">
            <span style="font-size: 28px; line-height: 1; font-weight: 300"
              >512 GB of Storage Xbox One S All</span
            >
          </h3>
        </div>
      </div>
    </section>
    <section id="catalog-2" class="py-5">
      <div class="container-fluid">
        <h4>Laptop, Computer, Tvs</h4>
        <div class="d-flex gap-3">
          <div
            class="
              poster-content
              d-flex
              justify-content-center
              align-items-start
            "
            style="
              background-image: url('/storage/home/cate12-min.jpg');
              padding: 70px 15px;
            "
          >
            <div class="text-center">
              <div data-element="content">
                <h5><span style="color: #f04706">Top Trending</span></h5>
                <h3 style="margin: 0">
                  <span style="font-size: 32px; line-height: 32px"
                    >VR Reality</span
                  >
                </h3>
                <h4 style="font-weight: 300; margin: 0">
                  <span style="font-size: 28px; line-height: 28px"
                    >3D Glasses</span
                  >
                </h4>
              </div>
              <button type="button" class="btn btn-primary mt-4">
                shop now
              </button>
            </div>
          </div>
          <catalog :categories="[31, 33]" />
        </div>
      </div>
    </section>
    <section id="banner-half" class="py-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div
              class="
                banner-half
                d-flex
                justify-content-center
                align-items-center
              "
              style="background-image: url('/storage/home/banner14-min.jpg')"
            >
              <div
                style="
                  padding: 1rem 0;
                  padding-right: 2.5rem;
                  margin-right: 2.5rem;
                  border-right: 1px solid #5e5e5e;
                "
              >
                <p class="m-0 fs-1">
                  smart<span style="color: #53d8ad">G3</span>
                </p>
                <p style="margin: 0">Now with 4G</p>
              </div>
              <div>
                <p class="mb-0">
                  <span style="font-size: 18px">now at</span>
                  <span style="font-size: 42px; line-height: 42px">
                    <strong><em>$</em>749 </strong>
                  </span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div
              class="banner-half text-end"
              style="background-image: url('/storage/home/banner15-min.jpg')"
            >
              <h3 class="mt-5 mb-0">iPhone 12 Pro</h3>
              <h3>Max 6.7" 128GB</h3>
              <p class="mb-0">
                <span style="font-size: 18px">now at</span>
                <span style="font-size: 42px; line-height: 42px">
                  <strong><em>$</em>749 </strong>
                </span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="catalog-3" class="py-5">
      <div class="container-fluid">
        <h4>Games, Cameras, Accessories</h4>
        <div class="d-flex gap-3">
          <div
            class="poster-content d-flex justify-content-center align-items-end"
            style="
              background-image: url('/storage/home/cate13-min.jpg');
              padding: 70px 15px;
            "
          >
            <div class="text-center">
              <h5><span style="color: #ffffff">Discount 25% Off</span></h5>
              <h3 style="margin: 0; font-weight: 300">
                <span style="font-size: 36px; line-height: 36px">Wireless</span>
              </h3>
              <h4 style="font-weight: 300; margin: 0 0 20px">
                <span style="font-size: 28px; line-height: 28px"
                  >Beats Studio3</span
                >
              </h4>
              <button type="button" class="btn btn-secondary mt-4">
                shop now
              </button>
            </div>
          </div>
          <catalog :categories="[32, 26, 35]" />
        </div>
      </div>
    </section>
    <section id="banner-2-1" class="py-5">
      <div class="container-fluid">
        <div class="row g-4">
          <div class="col-lg-8">
            <div
              class="banner-2-1-item"
              style="background-image: url('storage/home/banner16-min.jpg')"
            >
              <div data-element="content">
                <h3 style="margin: 0">
                  <span style="font-size: 30px"
                    >Asus Vivobook Express Yourself</span
                  >
                </h3>
                <p style="margin-bottom: 30px">
                  <span style="font-size: 20px"
                    >and the fastest Intel Core i7 processor ever</span
                  >
                </p>
                <p class="text-price mb-0">
                  <span style="color: #333e48"
                    ><span style="font-size: 18px">now at</span
                    ><span style="font-size: 42px; line-height: 42px"
                      ><strong><em>$</em>749 </strong></span
                    ></span
                  >
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div
              class="banner-2-1-item"
              style="background-image: url('storage/home/banner17-min.jpg')"
            >
              <div data-element="content">
                <h3 style="margin: 0">
                  <span style="font-size: 22px">iPhone X 128GB</span>
                </h3>
                <h3 style="font-weight: 300">
                  <span style="font-size: 24px">Retina Display</span>
                </h3>
                <p>
                  Discount
                  <span style="color: #f04706"><strong>25% Off</strong></span>
                </p>
                <p>
                  <a
                    style="color: #333e48"
                    class="btn btn-custom"
                    tabindex="0"
                    href="#"
                    >Shop Now</a
                  >
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="customer-support">
      <div class="container-fluid">
        <div class="row g-2">
          <div class="col-auto col-lg-4 col-xl-2 col-6">
            <div
              class="
                d-flex
                flex-column flex-md-row
                justify-content-evenly
                align-items-center
                border
              "
            >
              <i class="bi bi-truck fs-1"></i>
              <div class="content">
                <h6 class="m-0">Free Delivery</h6>
                <p class="m-0">from $50</p>
              </div>
            </div>
          </div>
          <div class="col-auto col-lg-4 col-xl-2 col-6">
            <div
              class="
                d-flex
                flex-column flex-md-row
                justify-content-evenly
                align-items-center
                border
              "
            >
              <i class="bi bi-chat-dots fs-1"></i>
              <div class="content">
                <h6 class="m-0">99 % Customer</h6>
                <p class="m-0">Feedbacks</p>
              </div>
            </div>
          </div>
          <div class="col-auto col-lg-4 col-xl-2 col-6">
            <div
              class="
                d-flex
                flex-column flex-md-row
                justify-content-evenly
                align-items-center
                border
              "
            >
              <i class="bi bi-arrow-counterclockwise fs-1"></i>
              <div class="content">
                <h6 class="m-0">365 Days</h6>
                <p class="m-0">for free return</p>
              </div>
            </div>
          </div>
          <div class="col-auto col-lg-4 col-xl-2 col-6">
            <div
              class="
                d-flex
                flex-column flex-md-row
                justify-content-evenly
                align-items-center
                border
              "
            >
              <i class="bi bi-credit-card fs-1"></i>
              <div class="content">
                <h6 class="m-0">Payment</h6>
                <p class="m-0">Secure System</p>
              </div>
            </div>
          </div>
          <div class="col-auto col-lg-4 col-xl-2 col-6">
            <div
              class="
                d-flex
                flex-column flex-md-row
                justify-content-evenly
                align-items-center
                border
              "
            >
              <i class="bi bi-tags fs-1"></i>
              <div class="content">
                <h6 class="m-0">Only Best</h6>
                <p class="m-0">Brands</p>
              </div>
            </div>
          </div>
          <div class="col-auto col-lg-4 col-xl-2 col-6">
            <div
              class="
                d-flex
                flex-column flex-md-row
                justify-content-evenly
                align-items-center
                border
              "
            >
              <i class="bi bi-headphones fs-1"></i>
              <div class="content">
                <h6 class="m-0">24/7</h6>
                <p class="m-0">free Support</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="bg-light py-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3">
            <h4>Latest</h4>
            <div class="bg-white">
              <div class="card border-0 mb-3" style="max-width: 540px">
                <div class="row g-0">
                  <div class="col-md-4">
                    <a href="#">
                      <img
                        src="/storage/product/beats_solo3_wireless_on-ear_headphones.jpg"
                        class="img-fluid rounded-start"
                        alt="Beats Solo3 Wireless On-Ear Headphones"
                      />
                    </a>
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <a
                        title="Beats Solo3 Wireless On-Ear Headphones"
                        href="#"
                      >
                        Beats Solo3 Wireless On-Ear Headphones
                      </a>
                      <span class="price">$40.00</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card border-0 mb-3" style="max-width: 540px">
                <div class="row g-0">
                  <div class="col-md-4">
                    <a href="#">
                      <img
                        src="/storage/product/airpods_pro_with_wireless_charging_case_1.jpg"
                        class="img-fluid rounded-start"
                        alt="AirPods Pro with Wireless Charging Case"
                      />
                    </a>
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <a
                        title="Beats Solo3 Wireless On-Ear Headphones"
                        href="#"
                      >
                        AirPods Pro with Wireless Charging Case
                      </a>
                      <div class="price">$130.00</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card border-0 mb-3" style="max-width: 540px">
                <div class="row g-0">
                  <div class="col-md-4">
                    <a href="#">
                      <img
                        src="/storage/product/dji_spark_fly_more_combo.jpg"
                        class="img-fluid rounded-start"
                        alt="DJI Spark Fly More Combo pro max"
                      />
                    </a>
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <a
                        title="Beats Solo3 Wireless On-Ear Headphones"
                        href="#"
                      >
                        DJI Spark Fly More Combo pro max
                      </a>
                      <div class="price">$180.00</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <h4>Top Trending</h4>
            <div class="card mb-3" style="max-width: 540px">
              <div class="row g-0">
                <div class="col-md-4">
                  <a href="#">
                    <img
                      src="/storage/product/new_apple_airpods_max_-_sky_blue.jpg"
                      class="img-fluid rounded-start"
                      alt="New Apple AirPods Max - Sky Blue"
                    />
                  </a>
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <a title="Beats Solo3 Wireless On-Ear Headphones" href="#">
                      New Apple AirPods Max - Sky Blue
                    </a>
                    <div class="price">$250.00</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <h4>Top Seller</h4>
          </div>
          <div class="col-lg-3">
            <h4>Top Popular</h4>
          </div>
        </div>
      </div>
    </section>
    <section id="brand" class="bg-white py-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-6 col-md-2">
            <img
              src="/storage/brand/brand1.jpg"
              class="img-fluid"
              alt="brand1"
            />
          </div>
          <div class="col-6 col-md-2">
            <img
              src="/storage/brand/brand2.jpg"
              class="img-fluid"
              alt="brand2"
            />
          </div>
          <div class="col-6 col-md-2">
            <img
              src="/storage/brand/brand3.jpg"
              class="img-fluid"
              alt="brand3"
            />
          </div>
          <div class="col-6 col-md-2">
            <img
              src="/storage/brand/brand4.jpg"
              class="img-fluid"
              alt="brand4"
            />
          </div>
          <div class="col-6 col-md-2">
            <img
              src="/storage/brand/brand5.jpg"
              class="img-fluid"
              alt="brand5"
            />
          </div>
          <div class="col-6 col-md-2">
            <img
              src="/storage/brand/brand6.jpg"
              class="img-fluid"
              alt="brand6"
            />
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Catalog from "../../components/web/home/Catalog.vue";
import Slider from "../../components/web/home/Slider.vue";
import TopCategories from "../../components/web/home/TopCategories.vue";
export default {
  components: { Slider, TopCategories, Catalog },
  name: "Home",
};
</script>

<style>
.banner-3-item {
  border-radius: 10px;
  min-height: 240px;
  background-color: transparent;
  padding: 30px 15px 15px 40px;
}
.banner-full {
  background-image: url("/storage/home/banner24-min.jpg");
  background-position: center center;
  border-radius: 10px;
  text-align: center;
  border-radius: 10px;
  min-height: 180px;
  background-color: transparent;
  padding: 15px 15px 15px 40px;
}
.banner-half {
  color: white;
  border-radius: 10px;
  border-radius: 10px;
  min-height: 240px;
  background-color: transparent;
  padding: 15px;
}
.banner-2-1-item {
  border-radius: 5px;
  min-height: 240px;
  background-color: transparent;
  padding-left: 60px;
  padding-top: 30px;
}
.poster-content {
  width: 270px;
  border-radius: 10px;
  height: 700px;
}
</style>
