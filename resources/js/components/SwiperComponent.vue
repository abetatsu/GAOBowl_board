<template>
     <swiper :options="swiperOption" ref="mySwiper1">
     <swiper-slide v-for="post in posts" :key="post.image_path"><img :src="post.image_path"></swiper-slide>
     <div class="swiper-pagination"  slot="pagination"></div>
     <div class="swiper-button-prev" slot="button-prev"></div>
     <div class="swiper-button-next" slot="button-next"></div>
     </swiper>
</template>

<style scoped>
.swiper-container {
     height: 300px;
     width: 100%;
}
.swiper-slide {
     text-align: center;
     font-size: 38px;
     font-weight: 700;
     background-color: #eee;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     -webkit-box-pack: center;
     -ms-flex-pack: center;
     justify-content: center;
     -webkit-box-align: center;
     -ms-flex-align: center;
     align-items: center;
     border-left:1px solid #fff;
}
</style>

<script>
export default {
          props: ["posts"],
          data() {
               return {
               swiperOption: {
                    autoplay: {
                         delay: 2500,
                         disableOnInteraction: false
                    },
                    pagination: {
                         el: '.swiper-pagination',
                         clickable: true
                    },
                    navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                    },
               },
          }
     }
}
</script>
