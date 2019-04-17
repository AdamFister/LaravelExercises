<template>
  <div>
    <br>
    <div class="cardrest" v-for="panel in panels" :key="panel">
      <div class="card-header" v-bind:id="panel.id">
        <h5 class="mb-0">
          <button
            class="btnrest btn-link collapsed"
            data-toggle="collapse"
            v-bind:data-target="panel.value"
            aria-expanded="false"
            v-bind:aria-controls="panel.value2"
          >{{ panel.id }}</button>
        </h5>
      </div>

      <div v-bind:id="panel.value2" class="collapse" data-parent="#accordionrest">
        <div class="cardrest">
          <div v-for="n in 8" :key="n">
            <restcard></restcard>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import restcard from "./restcard";
export default {
  name: "restpanel",
  components: {
    restcard
  },
  data() {
    return {
      panels: [
        { id: "Appetizers", value: "#collapseOne", value2: "collapseOne" },
        { id: "Main", value: "#collapseTwo", value2: "collapseTwo" },
        { id: "Sides", value: "#collapseThree", value2: "collapseThree" },
        { id: "Breakfast", value: "#collapseFour", value2: "collapseFour" }
      ],
      //   cards: [
      //     { divId: "collapseOne", aria: "headingOne", divId2: "apps" },
      //     { divId: "collapseTwo", aria: "headingTwo", divId2: "main" },
      //     { divId: "collapseThree", aria: "headingThree", divId2: "sides" },
      //     { divId: "collapseFour", aria: "headingFour", divId2: "breakfast" }
      //   ],
      app: ""
    };
  },
  methods: {}
};
</script>