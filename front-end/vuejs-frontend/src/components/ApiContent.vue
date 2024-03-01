<script >

//Importo AXIOS
import axios from 'axios';

export default {
  name: 'ApiContent',

  data() {
    return {
      events: [], //Array per le gli eventi
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
    }
  },
  mounted() {
    this.getEvents();
  }
}

</script>

<template>
  <h1>Events: </h1>

  <div>
    <ul>
      <li v-for="event in events" :key="event.id">
        <h2> Titolo evento: {{ event.title }}</h2>
        <p>Descrizione evento: {{ event.description }}</p>
      </li>
    </ul>
  </div>
</template>

<style scoped>
.read-the-docs {
  color: #888;
}
</style>
