<template>
  <form v-on:submit="onSubmit" action="/save_news" ref="form">
    <p>
      <input type="text" name="news_name" placeholder="Название" v-model="news_name">
    </p>
<!--    <p>-->
<!--      <input type="file" name="photo" v-model="photo">-->
<!--    </p>-->
    <p>
      <input type="text" name="text" placeholder="Текст новости" v-model="text">
    </p>
    <p>
      <input type="submit" value="Отправить">
    </p>

  </form>
</template>

<script>
export default {
  name: "VueForm",
  data() {
    return {
      news_name: 'Новость',
      photo: null,
      text: 'Текст новости'
    }
  },
  methods: {
    onSubmit: function(e) {
      e.preventDefault();
      console.log(this.news_name, this.text, this.$refs.form);
      this.$refs.form.submit();
    }
  }
}
</script>

<style scoped>

</style>