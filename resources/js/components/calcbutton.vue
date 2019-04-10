<template>
 <button type="button" class="btn btn-secondary color" @click="wasClicked">{{ tileID }}</button>
</template>

<script>
export default {
 name: "calcbutton",
 props: ['tileID'],
 data() {
   return {
       tileID: 0,
   };
 },
 methods: {
     wasClicked: function (){

        // emit up to vue that a tile was clicked and pass my tileID
         this.$emit("wasClicked", {'tileID': this.tileID});
     }
 }
};
</script>