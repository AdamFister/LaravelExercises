<template>
  <div>
    <h1>CALCULATOR</h1>

    <div id="calc-contain">
      <h2 id="calculator-display" class="calctext">{{ this.tileIDdisplay }}</h2>

      <div class="container">
        <div class="row" v-for="row in numArr" :key="row">
          <div class="col" v-for="col in row" :key="col">
            <calcbutton
              v-bind:tileID="col"
              v-bind:tileType="numTile"
              v-on:wasClicked="clickedButton"
              class="calcbutton"
            ></calcbutton>
          </div>
        </div>
        <div class="row" v-for="row in opArr" :key="row">
          <div class="col" v-for="col in row" :key="col">
            <calcbutton
              v-bind:tileID="col"
              v-bind:tileType="opTile"
              v-on:wasClicked="clickedButton"
              class="calcbutton"
            ></calcbutton>
          </div>
        </div>

        <!-- <div class="row" v-for="row in buttons" :key="row">
          <div class="col" v-for="col in row" :key="col">
            <calcbutton 
                v-bind:tileID="col" 
                v-on:wasClicked="clickedButton" 
                class="calcbutton"
                ></calcbutton>
          </div>
        </div>-->
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
      //   buttons: [
      //     ["C", "", "", "/"],
      //     ["7", "8", "9", "*"],
      //     ["4", "5", "6", "-"],
      //     ["1", "2", "3", "+"],
      //     ["0", "", ".", "="]
      //   ],
      numArr: [["0", "1", "2", "3", "4"], ["5", "6", "7", "8", "9"]],
      opArr: [["", ".", "-", "/"], ["*", "+", "C", "="]],
      num1: [],
      numTile: "number",
      opTile: "operator",
      number1: 0,
      tileIDdisplay: "",
      equalClicked: false,
      lastClicked: ""
    };
  },
  methods: {
    clickedButton: function(tileObject) {
      console.log("tileID: " + tileObject.tileID);
      console.log("tileType: " + tileObject.tileType);

      if (tileObject.tileID == "=") {
        this.lastClicked = tileObject.tileID;
        this.equalClicked = true;
        this.number1 = this.num1.join("");
        this.tileIDdisplay = eval(this.number1);
        this.num1 = [];
        this.num1.push(this.tileIDdisplay);
        //handle if operator is first button pushed
        if (isNaN(this.num1[0])) {
            console.log('NAN');
            this.num1 = [];
            this.lastClicked = "";
            this.tileIDdisplay = "";
            this.equalClicked = false;
            console.log(this.num1);
        }
      } else if (tileObject.tileID == "C") {
        this.lastClicked = tileObject.tileID;
        this.myClear();
      } else if (this.equalClicked == true && tileObject.tileType == "number") {
        this.lastClicked = tileObject.tileID;
        this.myClear();
        this.tileIDdisplay = tileObject.tileID;
        this.num1.push(tileObject.tileID);
        this.equalClicked = false;
      } else if (this.equalClicked == true && tileObject.tileType == "operator") {
        this.lastClicked = tileObject.tileID;
        this.tileIDdisplay += tileObject.tileID;
        this.num1.push(tileObject.tileID);
        this.equalClicked = false;
        console.log("num1= " + this.num1);
      }
      else if (tileObject.tileType == "operator" && this.num1[this.num1.length-1] == tileObject.tileID)
          { }
           else if (tileObject.tileType == "operator" && isNaN(this.lastClicked)) 
           { }
           else {
        this.lastClicked = tileObject.tileID;
        this.tileIDdisplay += tileObject.tileID;
        // collect numbers from buttons pressed and push them into array
        this.num1.push(tileObject.tileID);
        //handle if operator is first button pushed
        if (isNaN(this.num1[0])) {
            console.log('NAN');
            this.num1 = [];
            this.lastClicked = "";
            this.tileIDdisplay = "";
            console.log(this.num1);
        }
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
  width: 500px;
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