<template>
<!-- CHANGE DIV ID ARIA LABELLEDBY AND ID -->
  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionrest">
    <div class="cardrest">
      <img class="card-img-top" src="http://lorempixel.com/400/200/food/" alt="food">
      <div class="cardrest card-body" id="apps0">
        <div class="container" v-for="item in this.menu_array" :key="item">
          <h3>{{ item }}</h3>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "restcard",
  data() {
    return {
      cards: [
        { divId: "collapseOne", aria: "headingOne", id: "apps" },
        { divId: "collapseTwo", aria: "headingTwo", id: "main" },
        { divId: "collapseThree", aria: "headingThree", id: "sides" },
        { divId: "collapseFour", aria: "headingFour", id: "breakfast" }
      ],
      menu_array: [],
      app: ""
    };
  },
  methods: {},
  mounted: function() {
    //generate random menu items
    let self = this;
    fetch("https://entree-f18.herokuapp.com/v1/menu/8")
      .then(function(response) {
        return response.json();
        console.log("THEN1");
      })
      .then(function(myJson) {
        console.log("THEN2");
        for (let i = 0; i < 8; i++) {
          //store menu item and get rid of quotes
          self.app = JSON.stringify(myJson.menu_items[i].description);
          self.app = self.app.slice(1, -1);

          //generate random prices
          self.app += " $" + Math.round(Math.random() * 10000) / 100;
          console.log(self.app);

          //add zero to price when necessary
          if (self.app.charAt(self.app.length - 2) == ".") {
            self.app += "0";
          }

          //push to array
          self.menu_array.push(self.app);
        }
      })
      .catch(function(error) {
        console.log("ERROR");
        console.log(error);
      });
  }
};
</script>