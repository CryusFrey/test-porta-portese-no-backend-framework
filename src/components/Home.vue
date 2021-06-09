<template>
  <v-container>
    <v-row class="text-center" justify="center">
      <v-col cols="4">
        <v-btn @click="sortAsc">Ascendente</v-btn>
      </v-col>
      <v-col cols="4">
        <v-btn @click="sortDesc">Discendente</v-btn>
      </v-col>
    </v-row>
    <v-row class="text-center" justify="center">
      <v-col cols="8">
        <v-select v-if="items" v-model="selected" :items="items"></v-select>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import apiClient from "../service/apiClient";
  export default {
    name: 'Home',

    data() {
      return{
        ordiniApi: null,
        items: [],
        selected: null
      }
    },
    created() {
      apiClient.getOrdini()
      .then((response) => {
        this.ordiniApi = response.data.data
        this.extract()
      })
    },
    methods: {
      sortAsc(){
        apiClient.getOrdini()
            .then((response) => {
              this.ordiniApi = response.data.data
              this.extract()
            })
      },
      sortDesc(){
        apiClient.getOrdiniDesc()
            .then((response) => {
              this.ordiniApi = response.data.data
              this.extract()
            })
      },
      extract() {
        let items = []
        this.ordiniApi.forEach(function (obj){
          console.log(obj.cliente)
          items.push(obj.cliente + ' - '+obj.date)
        })
        this.items = items
        this.selected = this.items[0]

      }
    }
  }
</script>
