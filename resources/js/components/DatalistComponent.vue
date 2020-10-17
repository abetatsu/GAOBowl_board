<template>
<div>
     <input type="text" list="todofuken_list" class="form-control" placeholder="タイトルを入力して下さい" name="title">
     <datalist id="todofuken_list">
          <option v-for="post in posts" :value="post.title"></option>
     </datalist>
</div>
</template>

<script>
export default {
     props: ["posts"],
     data() {
          return {

          }
     }
}
</script>
