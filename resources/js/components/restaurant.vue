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

<style>

.centerrest {
  text-align: center;
}

.cardrest {
  width: 400px;
  margin: auto;
  float: none;
  font-family: "Josefin Sans", sans-serif;
  margin-bottom: 10px;
  color: rgb(49, 29, 165);
}

.btnrest,
.h5rest {
  text-align: center;
}

#accordionrest {
  float: center;
}

.fillrest {
  justify-content: center;
  align-items: center;
  width: 80%
}
.fillimgrest {
  max-width: 75%;
  max-height: 75%;
}

.h1rest,
.h2rest {
  font-weight: bold;
  font-family: "Josefin Sans", sans-serif;
  color: rgb(0, 0, 0);
}

.h3rest,
.h4rest {
  font-weight: bold;
  font-family: "Josefin Sans", sans-serif;
  color: rgb(49, 29, 165);
}

.btnrest {
  font-family: "Josefin Sans", sans-serif;
  font-weight: bold;
  font-size: 125%;
  color: rgb(49, 29, 165);
}

</style>

