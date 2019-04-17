<template>
 <button type="button" class="btn btn-secondary color" @click="wasClicked">{{ tileID }}</button>
</template>

<script>
export default {
 name: "calcbutton",
 props: [
     'tileID',
     'tileType'
        ],
 data() {
   return {
   };
 },
 methods: {
     wasClicked: function (){

        // emit up to vue that a tile was clicked and pass tileID and tileType
         this.$emit("wasClicked", {
             'tileID': this.tileID,
             'tileType': this.tileType
             });
     }
 }
};
</script>