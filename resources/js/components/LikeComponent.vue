<template>
  <div class="container">
    <div class="row justify-content-center mt-1">
      <div class="col-md-12">
        <div>
          <a @click="removefavorite()" class="btn btn-success" v-if="result">
               <i class="fas fa-thumbs-up"></i>
          </a>
          <a @click="favorite()" class="btn btn-secondary" v-else>
               <i class="fas fa-thumbs-up"></i>
          </a>
          <p>いいね数：{{ count }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["post"],
  data() {
       return {
            count: "",
            result: "false",
       }
  },
  mounted() {
    this.countfavorites();
    this.hasfavorites();
  },
  methods: {
    favorite() {
      axios.get("/posts/" + this.post.id + "/favorites")
      .then(res => {
           this.count = res.data.count;
           this.result = res.data.result;
      }).catch(function (error) {
          console.log(error);
        });
    },
    removefavorite() {
      axios.get("/posts/" + this.post.id + "/removefavorites")
      .then(res => {
           this.count = res.data.count;
           this.result = res.data.result;
      }).catch(function (error) {
          console.log(error);
        });
    },
    countfavorites() {
      axios.get("/posts/" + this.post.id + "/countfavorites")
      .then(res => {
           this.count = res.data;
      }).catch(function (error) {
          console.log(error);
        });
    },
    hasfavorites() {
      axios.get('/posts/' + this.post.id+'/hasfavorites')
      .then(res => {
           this.result = res.data;
      }).catch(function (error) {
          console.log(error);
        });
    }
  },
};
</script>
