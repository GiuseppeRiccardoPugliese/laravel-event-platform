<script >

//Importo AXIOS
import axios from 'axios';

export default {
  name: 'ApiContent',

  data() {
    return {
      events: [], //Array per gli eventi
      users: [],//Array per gli utenti
      tags: [],//Array per i tags
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
    getTags() {
      axios.get('http://localhost:8000/api/v1/tags/index')
        .then(res => {

          const data = res.data;
          console.log('2nd log tag', res);
          this.tags = data.tags;

          console.log('2nd log tag', this.tags);

        })
        .catch(err => {
          console.log(err);
        })
    },
    getUserNameById(userId) {

      // Trovo l'utente nell'array 'this.users' con l'ID corrispondente
      const user = this.users.find(user => user.id === userId);
      return `User: ${user.name} - Mail: ${user.email}`;

    },

  },
  mounted() {
    this.getEvents();
    this.getUsers();
    this.getTags();
  }
}

</script>

<template>

    <body>

        <div class="container">
            <h1 class="text-center fw-bolder text-danger mb-4">Events</h1>
            <div class="row">
              <div v-for="event in events" :key="event.id" class="col-md-4">
                <div class="card mb-4 shadow-sm">
                  <div class="card-body">
                    <h5 class="card-title">Titolo evento: {{ event.title }}</h5>
                    <p class="card-text">Descrizione evento: {{ event.description }}</p>
                    <p class="user-info">{{ getUserNameById(event.user_id) }}</p>
                    <ul>
                      <li v-for="tag in event.tags" :key="tag.id">
                        <span>Tag: {{ tag.name }}</span>
                      </li>
                    </ul>
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
