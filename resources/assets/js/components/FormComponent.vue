<template>
  <div class="col-md-4">
      <form @submit.prevent="salvarTweet">
          <div class="form-group">
              <textarea class="form-control" rows="8" cols="8" maxlength="130" v-model="body" required></textarea>
          </div>
          <div class="form-group">
              <button class="btn btn-primary">
                  Tweet 
              </button>    
          </div>
      </form>
  </div>
</template>

<script>

import Event from '../event.js';
export default {

    data() {
        return {
            body: '',
            postagemData: {} 
        }
    },

    methods: {
        salvarTweet() {
            axios.post('/tweet/salvar', {body: this.body}).then(res => {
                this.postagemData = res.data;
                Event.$emit('added_tweet', this.postagemData);
            }).catch(e => {
                console.log(e);
            });
            this.body = '';
        }
    }
}
</script>

<style>

</style>