<script >

//Importo AXIOS
import axios from 'axios';

export default {
  name: 'ApiContent',

  data() {
    return {
      events: [], //Array per le gli eventi
      users:[],//Array per le gli utenti
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
    getUsers() {
      axios.get('http://localhost:8000/api/v1/users/index')
        .then(res => {

          const data = res.data;

          this.users = data.users;

        })
        .catch(err => {
          console.log(err);
        })
    },

  },
  mounted() {
    this.getEvents();
    this.getUsers();
  }
}

</script>

<template>


    <div class="container">
        <h1 class="text-center fw-bolder text-danger mb-4">Events</h1>
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
</template>

<style scoped>

.card{
    height: 300px;
}

.read-the-docs {
  color: #888;
}
</style>
