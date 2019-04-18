<template>
  <div id="app">
  <div class="container weathercenter">
      <h1>WEATHER</h1>
        <input type="text" id="zipCode" placeholder="12345" v-model="zipCode" @keyup.enter="myFunction()">
        <p> {{ weatherError }} </p>
        
        <button class = "weathertop" @click="myFunction()">Get Weather</button>
  </div>
  <div class="container center" style = "display:block" id="WeatherStuff">
    
      <div class="container weathercenter" v-show="this.showDiv">
        <!-- <p id="Error"></p> -->
        <div class="weatherrow">
        <weatherp id="CityHere">{{ city }}</weatherp>
      </div>
        <div class="row">
        <div class="col">
        <weatherp id="TempKelvinHere">{{ tempKelvinHere }}</weatherp>
        </div>
        <div class="col">
        <weatherp id="TempFahrenheitHere">{{ tempFahrenheitHere }}</weatherp>
        </div>
        <div class="col">
        <weatherp id="TempCelsiusHere">{{ tempCelsiusHere }}</weatherp>
        </div>
      </div>
      <img id="PictureHere" class="img-fluid smallpic" :src="pictureHere">
  <div>
      
        <weatherp id="ConditionHere">{{ condition }}</weatherp>
      </div>
      </div>
        
      </div>

  </div>
</template>

<script>
export default {
  name: "weather",
  data() {
    return {
        zipCode: "",
        tempKelvin: "",
        city: "",
        condition: "",
        tempNumKelvin: 0,
        tempFahrenheit: 0,
        tempCelsius: 0,
        tempKelvinHere: "",
        tempFahrenheitHere: "",
        tempCelsiusHere: "",
        pictureHere: "/img/weather.jpg",
        weatherError: "",
        showDiv: false,
        tempIcon: ""

    };
  },
  methods: {

    processData() {
    
        this.tempKelvin = JSON.stringify(this.myJson.list[0].main.temp);
        this.city = JSON.stringify(this.myJson.city.name);
        this.condition = JSON.stringify(this.myJson.list[0].weather[0].description);
        this.tempIcon = JSON.stringify(this.myJson.list[0].weather[0].icon); 
        this.tempIcon = this.tempIcon.slice(1, -1);
        this.pictureHere = "http://openweathermap.org/img/w/" + this.tempIcon + ".png"
        this.weatherError = "";

        this.city = this.city.slice(1, -1);
        this.condition = this.condition.slice(1, -1);

        this.tempNumKelvin = parseFloat(this.tempKelvin);
        this.tempFahrenheit = (this.tempNumKelvin - 273.15) * 9/5 + 32;
        this.tempCelsius = this.tempNumKelvin - 273 ;

        this.tempKelvinHere = Math.round(this.tempNumKelvin) + " K";
        this.tempFahrenheitHere = Math.round(this.tempFahrenheit) + "°F";
        this.tempCelsiusHere = Math.round(this.tempCelsius) + "°C";

    },


    myFunction() {
        
        let self = this;
        axios
        .get('https://cors-anywhere.herokuapp.com/' + 'http://api.openweathermap.org/data/2.5/forecast?zip=' + this.zipCode + '&APPID=53f03e4e31f2a70d7b4aa1cdf081e981')
        .then(response => {
            self.showDiv = true;
            self.myJson = response.data;
            self.processData()
        })
        .catch(function(error) {
            self.weatherError = "Please enter a valid zip code";
        })},
    }}



</script>