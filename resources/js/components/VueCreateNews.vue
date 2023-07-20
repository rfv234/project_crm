<template>
  <form v-on:submit="onSubmit" action="/save_news" ref="form">
    <input type="hidden" name="id" v-model="id">
    <p>
      <input type="text" name="news_name" placeholder="Название" v-model="news_name" id="inp1">
    <div v-if="name_errors.length">
      <ul>
        <li v-for="error in name_errors">{{ error }}</li>
      </ul>
    </div>
    </p>
    <!--    <p>-->
    <!--      <input type="file" name="photo" v-model="photo">-->
    <!--    </p>-->
    <p>
      <textarea name="text" placeholder="Текст новости" v-model="text" id="area"></textarea>
    <div v-if="text_errors.length">
      <ul>
        <li v-for="error in text_errors">{{ error }}</li>
      </ul>
    </div>
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
      id: this.novelty.id,
      name_errors: [],
      text_errors: []
    }
  },
  methods: {
    onSubmit: function (e) {
      e.preventDefault();
      this.name_errors = [];
      this.text_errors = [];
      if (!this.news_name) {
        this.name_errors.push('Требуется указать название новости');
      }
      if (!this.text) {
        this.text_errors.push('Требуется написать текст новости');
      }
      if (this.news_name.length > 128) {
        this.name_errors.push('Слишком длинное название');
      }
      if (this.text.length > 1024) {
        this.text_errors.push('Слишком длинный текст');
      }
      if (this.name_errors.length === 0 && this.text_errors.length === 0) {
        console.log(this.news_name, this.text, this.$refs.form);
        this.$refs.form.submit();
      }
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

li {
  color: red;
}
</style>