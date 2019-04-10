<template>
  <div>
    <h1>CALCULATOR</h1>

    <div id="calc-contain">
      <h2 id="calculator-display" class="calctext">{{ this.tileIDdisplay }}</h2>

      <div class="container">
        <div class="row" v-for="row in buttons" :key="row">
          <div class="col" v-for="col in row" :key="col">
            <calcbutton 
            v-bind:tileID="col" 
            v-on:wasClicked="clickedButton" 
            class="calcbutton"
            ></calcbutton>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import calcbutton from "./calcbutton";

export default {
  name: "calculator",
  components: {
    calcbutton
  },
  data() {
    return {
      buttons: [
        ["C", "", "", "/"],
        ["7", "8", "9", "*"],
        ["4", "5", "6", "-"],
        ["1", "2", "3", "+"],
        ["0", "", ".", "="]
      ],
      num1: [],
      operator: "",
      number1: 0,
      tileIDdisplay: "",
      equalClicked: false
    };
  },
  methods: {


    clickedButton: function(tileID) {

      if (tileID.tileID == "=") {
          this.equalClicked = true;
          this.number1 = this.num1.join('');
          this.tileIDdisplay = eval(this.number1);
          this.num1 = [];
          this.num1.push(this.tileIDdisplay);
      }
      else if (tileID.tileID == "C") {
          this.myClear();
      }
      else if (this.equalClicked == true && typeof eval(tileID.tileID) == "number") {
            this.myClear();
            this.tileIDdisplay = tileID.tileID;
            this.num1.push(tileID.tileID);
          }
      else {
          this.tileIDdisplay = tileID.tileID;
          // collect numbers from buttons pressed and push them into array
          this.num1.push(tileID.tileID);
          console.log(this.num1);
      }
    },

    myClear: function() {
      this.equalClicked = false;
      this.num1 = [];
      this.tileIDdisplay = "";
      this.number1 = 0;
    }
  }
};
</script>

<style>
#calc-contain {
  position: relative;
  width: 400px;
  border: 2px solid black;
  border-radius: 12px;
  margin: 0px auto;
  padding: 20px 20px 100px 20px;
}

.calcbutton {
  background: lightGray;
  width: 75%;
  height: 45px;
  font-size: 20px;
  font-weight: 900;
  border-radius: 7px;
  margin-left: 13px;
  margin-top: 10px;
}

.calcbutton:hover {
  background-color: #230261;
  color: white;
}

.calctext {
  position: relative;
  display: block;
  width: 90%;
  height: 45px;
  margin: 5px auto;
  font-size: 20px;
  padding: 10px;
  box-shadow: 4px 0px 12px black inset;
  text-align: right;
}

.calcimg-fluid {
  max-width: 100%;
  height: auto;
}
</style>