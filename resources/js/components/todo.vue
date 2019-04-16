<template>
  <div id="app">
    <h1>To Do</h1>
    <input
      type="text"
      v-model="todotext"
      placeholder="what needs to be done?"
      @keyup.enter="addTask"
      size="50"
    >

    <br>
    <br>
    <p>Items left to do:</p>
    <ul>
      <li v-for="todo in todos" :key="todo.id">
             <input class='toggle' type='checkbox' @change='updateStatus(todo.id)' id='"checkbox-" + todo.id'
               :value='todo.id' v-model='todo.complete'>
             <label for='"checkbox-" + todo.id'>{{ todo.text }}</label>
           </li>
    </ul>
    <button @click="filterAll">Show All</button>
    <button @click="filterTodo">Show To Do</button>
    <button @click="filterCompleted">Show Completed</button>
    <br>

    <button @click="completeAll">Complete All</button>
    <button @click="reactivateAll">Reactivate All</button>
    <button @click="clearCompleted">Clear Completed</button>
    <br>
  </div>
</template>

<script>
export default {
  name: "todo",
  data() {
    return {
      todotext: "",
      todos: [],
      status: 'All',
    };
  },
  methods: {
    addTask() {
      axios.post("/new", { body: this.todotext }).then(resp => {
        this.filterAll();
      });
      this.todotext = "";
    },

    filterAll() {
      axios.get("/all").then(resp => {
        this.todos = resp.data;
        //url: /all to see all
        this.status = "All";
      })},

      filterTodo() {
      axios.get("/remaining").then(resp => {
        this.todos = resp.data;
        this.status = "Todo";
      })},
      
      filterCompleted() {
      axios.get("/completed").then(resp => {
        this.todos = resp.data;
        this.status = "Completed";
      })},

      completeAll(id) {
          for (let i=0; i<this.todos.length; i++) {
              if (this.todos[i].complete == 0) {
                  this.todos[i].complete = 1;
                  axios.post("/update", {id: this.todos[i].id}).then(resp => {
                    this.filterAll(); });
              }}},

      reactivateAll(id) {
          for (let i=0; i<this.todos.length; i++) {
              if (this.todos[i].complete == 1) {
                  this.todos[i].complete = 0;
                  axios.post("/update", {id: this.todos[i].id}).then(resp => {
                    this.filterAll(); });
              }}},

      clearCompleted(id) {
          for (let i=0; i<this.todos.length; i++) {
              if (this.todos[i].complete == 1) {
                  axios.post("/updatecleared", {id: this.todos[i].id}).then(resp => {
                    this.filterAll(); });
              }}},
      
      updateStatus(id) {
       axios.post("/update", {id: id}).then(resp=>{
         this.filterAll();
       });
    }
  },
  mounted() {
    axios.get("/all").then(resp => {
      this.todos = resp.data;
    });
  }
};
</script>