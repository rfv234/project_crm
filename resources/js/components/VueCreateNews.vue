<template>
  <form v-on:submit="onSubmit" action="/save_news" ref="form">

    <p>
      <input type="text" name="news_name" placeholder="Название" v-model="news_name" id="inp1">
    </p>
    <!--    <p>-->
    <!--      <input type="file" name="photo" v-model="photo">-->
    <!--    </p>-->
    <p>
      <textarea name="text" placeholder="Текст новости" v-model="text" id="area"></textarea>
    </p>
    <p>
      <input type="submit" value="Сохранить">
    </p>
  </form>
  <p>
    <a v-bind:href=deletion_url>
      <button>Удалить</button>
    </a>
  </p>
</template>

<script>
export default {
  name: "VueForm",
  props: [
    'novelty'
  ],
  data() {
    return {
      news_name: this.novelty.name,
      photo: null,
      text: this.novelty.text,
      deletion_url: '/delete?id=' + this.novelty.id ?? '',
    }
  },
  methods: {
    onSubmit: function (e) {
      e.preventDefault();
      console.log(this.news_name, this.text, this.$refs.form);
      this.$refs.form.submit();
    }
  },
}
</script>

<style scoped>
#inp1 {
  width: 50%;
}

#area {
  width: 50%;
  height: 80px;
}
</style>