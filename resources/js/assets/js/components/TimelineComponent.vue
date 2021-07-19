<template>
  <div class="col-md-8 postagens">
      <p v-if="!postagens.length">Sem postagens</p>
      <div class="media" v-for="postagem in postagens" :key="postagem.id">
          <img class="mr-3"/>
          <div class="media-body">
              <div class="mt-3">
                  <a href="#">{{postagem.user.name}}</a>
              </div>
              <p>{{postagem.body}}</p>
          </div>
      </div>
  </div>
</template>

<script>
import Event from '../event.js';
export default {
    data() {
        return {
            postagens:[],
            postagem: {}
        }
    },

    mounted() {
        Event.$on('added_tweet', (postagem) => {
            this.postagens.unshift(postagem);
        });
    }
}
</script>

<style>

</style>