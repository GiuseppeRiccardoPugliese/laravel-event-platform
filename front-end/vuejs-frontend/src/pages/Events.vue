<script >

//Importo AXIOS
import axios from 'axios';

export default {
  name: 'Home',

  data() {
    return {
      events: [], //Array per gli eventi
    }
  },
  methods: {
    getEvents() {
      axios.get('http://localhost:8000/api/v1/events/index')
        .then(res => {

          const data = res.data;
          console.log('log di data', res);

          this.events = data.events;
          console.log('2nd log', this.events);

        })
        .catch(err => {
          console.log(err);
        })
    },
  },
  mounted() {
    this.getEvents();
  }
}

</script>

<template>

    <body>

        <div class="container">
            <h1 class="text-center fw-bolder text-danger mb-4">Events: </h1>
            <div class="row">
              <div v-for="event in events" :key="event.id" class="col-md-4">
                <div class="card mb-4 shadow-sm">
                  <div class="card-body">
                    <h5 class="card-title">Titolo evento: {{ event.title }}</h5>
                    <p class="card-text">Descrizione evento: {{ event.description }}</p>
                  </div>
                </div>
              </div>
            </div>
        </div>

    </body>

</template>

<style scoped>

body{
    background-color: rgb(53, 49, 49);
}

.row {
  margin-top: 20px;
}

.card {
  border: 1px solid white;
  height: 400px;
  transition: transform 0.3s ease-in-out;
  background-color: #666;
  color: black;
  cursor: pointer;
}

.card:hover {
  transform: scale(1.05);
}

.user-info {
  font-weight: bold;
  color: #75afed;
}



</style>
