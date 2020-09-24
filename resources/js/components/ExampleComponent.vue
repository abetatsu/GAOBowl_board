<template>
    <div class="container" style="margin-top:50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong> Laravel Vue JS Infinite Scroll - codechief.org</strong></div>
  
                    <div class="card-body">
                        <div>
                          <p v-for="item in list" :key="item.id">
                            <a v-bind:href="'http://127.0.0.1:8000/post/'+item.slug" target="_blank">{{item.title}}</a>
                          </p>
                          <infinite-loading @distance="1" @infinite="infiniteHandler"></infinite-loading>
  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
  
<script>
    export default {
        
        data() {
            return {
              list: [],
              page: 1,
            };
          },
          methods: {
            infiniteHandler($state) {
      
                this.$http.get('/posts?page='+this.page)
                    .then(response => {
                        return response.json();
                         
                    }).then(data => {
                        $.each(data.data, (key, value)=> {
                                this.list.push(value);
                        });
                    $state.loaded();
                    });
  
                this.page = this.page + 1;
            },
          },
    }
</script> 