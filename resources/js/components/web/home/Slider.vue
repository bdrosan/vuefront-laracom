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
      ></button>
      <button
        type="button"
        data-bs-target="#carouselExampleFade"
        data-bs-slide-to="1"
        aria-label="Slide 2"
      ></button>
      <button
        type="button"
        data-bs-target="#carouselExampleFade"
        data-bs-slide-to="2"
        aria-label="Slide 3"
      ></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img
          src="/storage/slider/revo11-min.jpg"
          class="d-block w-100"
          alt="..."
        />
      </div>
      <div class="carousel-item">
        <img
          src="/storage/slider/revo12-min.jpg"
          class="d-block w-100"
          alt="..."
        />
        <div style="position: absolute; top: 15%; left: 15%">
          <div class="fs-2">Title</div>
          <div class="display-4">Description</div>
          <button class="btn btn-primary">Shop Now</button>
        </div>
      </div>
      <div class="carousel-item">
        <img
          src="/storage/slider/revo13-min.jpg"
          class="d-block w-100"
          alt="..."
        />
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
</style>
