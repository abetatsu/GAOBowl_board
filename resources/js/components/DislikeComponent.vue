<template>
  <div class="container">
    <div class="row justify-content-center mt-1">
      <div class="col-md-12">
        <div>
          <a @click="removeunfavorite()" class="btn btn-danger" v-if="result">
               <i class="fas fa-thumbs-down"></i>
          </a>
          <a @click="unfavorite()" class="btn btn-secondary" v-else>
               <i class="fas fa-thumbs-down"></i>
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
    this.countunfavorites();
    this.hasunfavorites();
  },
  methods: {
    unfavorite() {
      axios.get("/posts/" + this.post.id + "/unfavorites")
      .then(res => {
           this.count = res.data.count;
           this.result = res.data.result;
      }).catch(function (error) {
          console.log(error);
        });
    },
    removeunfavorite() {
      axios.get("/posts/" + this.post.id + "/removeunfavorites")
      .then(res => {
           this.count = res.data.count;
           this.result = res.data.result;
      }).catch(function (error) {
          console.log(error);
        });
    },
    countunfavorites() {
      axios.get("/posts/" + this.post.id + "/countunfavorites")
      .then(res => {
           this.count = res.data;
      }).catch(function (error) {
          console.log(error);
        });
    },
    hasunfavorites() {
      axios.get('/posts/' + this.post.id+'/hasunfavorites')
      .then(res => {
           this.result = res.data;
      }).catch(function (error) {
          console.log(error);
        });
    }
  },
};
</script>