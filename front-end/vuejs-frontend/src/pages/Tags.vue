<script >

//Importo AXIOS
import axios from 'axios';

export default {
  name: 'Tags',

  data() {
    return {
      tags: [],//Array per i tags
    }
  },
  methods: {
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

  },
  mounted() {
    this.getTags();
  }
}

</script>

<template>

    <body>
        <div class="container">
            <h1 class="text-center fw-bolder text-danger mb-4">Tags: </h1>
            <div class="row">
              
                <div class="card mb-4 shadow-sm">
                  <div class="card-body">
                    <ul>
                      <li v-for="tag in tags" :key="tag.id">
                        <span>Tag: {{ tag.name }}</span>
                      </li>
                    </ul>
                  </div>
                </div>

            </div>
        </div>

    </body>

</template>

<style scoped>

body{
    background-color: rgb(53, 49, 49);
    height: 100vh;
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
