<template>
  <div
    id="carouselExampleFade"
    class="carousel slide carousel-fade"
    data-bs-ride="carousel"
  >
    <div class="carousel-indicators">
      <button
        type="button"
        data-bs-target="#carouselExampleFade"
        data-bs-slide-to="0"
        class="active"
        aria-current="true"
        aria-label="Slide 1"
      />
      <button
        type="button"
        data-bs-target="#carouselExampleFade"
        data-bs-slide-to="1"
        aria-label="Slide 2"
      />
      <button
        type="button"
        data-bs-target="#carouselExampleFade"
        data-bs-slide-to="2"
        aria-label="Slide 3"
      />
    </div>
    <div class="carousel-inner slider">
      <div
        class="carousel-item active"
        style="background-image: url('/storage/slider/revo11-min.jpg')"
      >
        <div class="slider-caption">
          <div class="fs-2">Lorem ipsum</div>
          <div class="display-4 mb-3">Lorem ipsum dolor sit</div>
          <a href="#" class="btn btn-primary">Shop Now</a>
        </div>
      </div>
      <div
        class="carousel-item"
        style="background-image: url('/storage/slider/revo12-min.jpg')"
      >
        <div class="slider-caption">
          <div class="fs-2">Lorem ipsum</div>
          <div class="display-4 mb-3">Lorem ipsum dolor sit</div>
          <a href="#" class="btn btn-primary">Shop Now</a>
        </div>
      </div>
      <div
        class="carousel-item"
        style="background-image: url('/storage/slider/revo13-min.jpg')"
      >
        <div class="slider-caption">
          <div class="fs-2">Lorem ipsum</div>
          <div class="display-4 mb-3">Lorem ipsum dolor sit</div>
          <a href="#" class="btn btn-primary">Shop Now</a>
        </div>
      </div>
    </div>
    <button
      class="carousel-control-prev"
      type="button"
      data-bs-target="#carouselExampleFade"
      data-bs-slide="prev"
    >
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button
      class="carousel-control-next"
      type="button"
      data-bs-target="#carouselExampleFade"
      data-bs-slide="next"
    >
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</template>

<script>
export default {
  name: "Slider",
};
</script>

<style>
.slider .carousel-item {
  background-color: #e6e6e6;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center center;
  height: 400px;
}
.slider-caption {
  position: absolute;
  top: 80px;
  left: 15%;
  max-width: 360px;
}
</style>
