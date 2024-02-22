<template>
  <div id="general">
    <form v-on:submit="add_message">
      <div v-for="item in chat" v-bind:class="'msg border_'+item.id">
        <span>{{ item.message }}</span>
      </div>
      <input type="text" v-model=new_message placeholder="Введите сообщение">
      <input type="submit">
    </form>
  </div>
</template>

<script>
export default {
  name: "VueChat",
  data() {
    return {
      chat: [
        {
          message: 'Добрый день, меня зовут Марк!',
          id: 'bot'
        },
        {
          message: 'Как я могу к вам обращаться?',
          id: 'bot'
        }
      ],
      new_message: '',
      responce_count: 0
    }
  },
  methods: {
    add_message: function (e) {
      e.preventDefault();
      this.chat.push({
        message: this.new_message,
        id: 'people'
      });
      setTimeout(this.responce_message, 2500);
      if (this.responce_count < 2) {
        axios.post('/save_chat', {
          chat: this.chat
        }).catch(e => {
          console.log(e);
        })
      }
    },
    responce_message: function () {
      let bot_message;
      if (this.responce_count <= 1) {
        if (this.responce_count == 0) {
          bot_message = 'Извините, я сейчас занят. Оставьте свой номер телефона, и я вам перезвоню.';
        }
        if (this.responce_count == 1) {
          bot_message = 'Извините, все операторы заняты. Оставьте свои контактные данные, и они с вами свяжутся.';
        }
        this.chat.push({
          message: bot_message,
          id: 'bot'
        });
      }
      this.responce_count += 1;
    }
  }
}
</script>

<style scoped>
#general {
  border: solid 2px;
  width: 450px;
  background-color: lightblue;
}

.msg {
  border: solid 2px;
  border-radius: 10px;
  margin: 15px;
  width: fit-content;
  padding: 5px;
}

.border_bot {
  background-color: aquamarine;
  margin-left: 0;
}

.border_people {
  background-color: blueviolet;
  margin-right: 0;
  margin-left: auto;
}
</style>