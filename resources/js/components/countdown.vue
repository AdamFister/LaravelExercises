<template>
<div>
    <div class="container">
            <h1>{{ time_str }}</h1>
    </div>
</div>
</template>

<script>
export default {
    name: "countdown",
    data() {
        return { 
        interval: null,
        time_str: ""
        };
    },
    methods: {
        getNumber() {
            this.time_str = prompt("Enter positive number for countdown in seconds", "");
            if (this.time_str > 0) {
                this.displayTime();  
            }
            else {
                this.getNumber();
            }
        },
        displayTime: function () {
            this.interval = setInterval(() => {
                this.time_str--;
                if (this.time_str == 0) 
                    {
                        clearInterval(this.interval);
                        this.time_str="COMPLETE"
                    }
                }, 1000)
            
        }
    },

    created() {
            this.getNumber();
    },
    computed: {
        
    }
}
</script>