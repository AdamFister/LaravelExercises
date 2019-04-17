<template>
  <div>
    <div class="container centerrest">
      <br>
      <h1>
        <h1rest class="centerrest">The Burnt Tongue</h1rest>
      </h1>
      <h3>
        <h3rest>We are located at 348 E. Main St.</h3rest>
      </h3>
      <h3>
        <h3rest>Lexington, KY 40507</h3rest>
      </h3>
      <br>
      <h2>
        <h2rest>Hours</h2rest>
      </h2>
      <h3>
        <h3rest>Wednesday through Saturday, dinner only: 5pm - 10pm</h3rest>
      </h3>
      <h3>
        <h3rest>Sunday, brunch and dinner: 11am - 8pm</h3rest>
      </h3>
      <br>
      <div>
        <img class="fillrest" src="/img/burger-chips-dinner-70497.jpg" alt="food">
      </div>
    </div>

    <div id="accordionrest">
        <restpanel></restpanel>
    </div>
  </div>
</template>

<script>
import restpanel from "./restpanel";
export default {
  name: "restaurant",
  components: {
    restpanel
  },
  data() {
    return {

    };
  },

};
</script>


