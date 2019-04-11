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
      <restcard></restcard>
      <restcard></restcard>
      <restcard></restcard>
      <restcard></restcard>
      <restcard></restcard>
      <restcard></restcard>
      <restcard></restcard>
      <restcard></restcard>
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
      app: ""
    };
  },
  methods: {

  },

};
</script>