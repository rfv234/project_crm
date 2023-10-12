<template>
  <form v-on:submit="onSubmit" action="/save_news" ref="form">
    <h1 id="name_up">Заполните поля</h1>
    <div id="box">
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
        <span>Автор новости: </span>
        <select v-model="user" name="user" class="second">
          <option v-for="user in users" v-bind:value="user.id">{{ user.name }}</option>
        </select>
      </p>
      <p>
        <span>Рейтинг новости: </span>
        <input name="news_order" type="number" v-model="news_order" class="second">
      </p>
      <p v-if="canupdate">
        <input type="submit" value="Сохранить" id="save">
      </p>
    </div>
  </form>
  <p v-if="candelete">
    <a v-bind:href=deletion_url>
      <button id="delete">Удалить</button>
    </a>
  </p>
  <a href="/news">
   <button>Вернуться на главную страницу</button>
  </a>
</template>

<script>
export default {
  name: "VueForm",
  props: [
    'novelty',
    'users',
    'canupdate',
    'candelete'
  ],
  data() {
    return {
      news_name: this.novelty.name,
      photo: null,
      text: this.novelty.text,
      deletion_url: '/delete?id=' + this.novelty.id ?? '',
      id: this.novelty.id,
      name_errors: [],
      text_errors: [],
      news_order: 1,
      user: 1,
      canupdate: this.canupdate,
      candelete: this.candelete
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
  margin-top: 75px;
}

#area {
  width: 50%;
  height: 80px;
  margin-top: 75px;
}

li {
  color: red;
}

#name_up {
  text-align: center;
}

#box {
  width: 700px;
  height: 800px;
  border: solid 3px;
  background-color: lightblue;
  margin-left: 32%;
  margin-top: 35px;
  text-align: center;

}

.second {
  margin-top: 75px;
  width: 35%;
  text-align: center;
}

#save {
  position: absolute;
  left: 64%;
  top: 88.7%;
}

#delete {
  position: absolute;
  left: 32.7%;
  top: 88.7%;
}

</style>