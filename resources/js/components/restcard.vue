<template>
<!-- CHANGE DIV ID, ARIA LABELLEDBY, AND ID -->
<div>

    <div class="cardrest">
      <img class="card-img-top" src="http://lorempixel.com/400/200/food/" alt="food">
      <!-- <div class="cardrest card-body" v-bind:id="card.divId2"> -->
        <div class="container" v-for="item in menu_array" :key="item">
          <h3>{{ item }}</h3>

      </div>
    </div>

  </div>

</template>

<script>
export default {
  name: "restcard",
  data() {
    return {

      ids: [
          { id: "one" },
          { id: "two" },
          { id: "three" },
          { id: "four" },
          { id: "five" },
          { id: "six" },
          { id: "seven" },
          { id: "eight" },
      ],
      menu_array: [],
      myJson: null,
      app: ""
    };
  },
  methods: {
      processData() {
        
          //store menu item and get rid of quotes
          this.app = JSON.stringify(this.myJson.menu_items[0].description);
          this.app = this.app.slice(1, -1);

          //generate random prices
          this.app += " $" + Math.round(Math.random() * 10000) / 100;

          //add zero to price when necessary
          if (this.app.charAt(this.app.length - 2) == ".") {
            this.app += "0";
          }

          //push to array
          this.menu_array.push(this.app);
      }
  },
  mounted: function() {
    //generate random menu items
    let self = this;
    axios
      .get('https://cors-anywhere.herokuapp.com/' + 'https://entree-f18.herokuapp.com/v1/menu/1')
      .then(response => {
          self.myJson = response.data;
          self.processData()
      }   
      )
      .catch(function(error) {
        console.log(error);
      });
  }
  }
</script>