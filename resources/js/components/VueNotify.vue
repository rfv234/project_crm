<template>
  <form v-on:submit="onSubmit" action="/save_notify" ref="form">
    <p>
      <input type="hidden" name="sender_id" v-model="sender_id" v-bind:value="currentuser">
    </p>
    <p>
      <span>Получатель сообщения: </span>
      <select v-model="user" name="user" class="second">
        <option  v-for="user in users_list" v-bind:value="user.id">{{ user.name }}</option>
      </select>
    </p>
    <p>
      <textarea name="text" placeholder="Текст сообщения" v-model="text" id="area"></textarea>
    </p>
    <p>
      <input type="submit" value="Отправить сообщение">
    </p>
  </form>
</template>

<script>
export default {
  name: "VueNotify",
  props: [
    'users',
    'currentuser'
  ],
  data() {
    return {
      sender_id: this.currentuser,
      text: '',
      user_id: 1,
      users: this.users,
    }
  },
  methods: {
    onSubmit: function (e) {
      e.preventDefault();
      this.$refs.form.submit();
    }
  },
  computed: {
    users_list: function () {
      var sender_id = this.currentuser;
      var users = this.users;
      this.users.map(function (value, key) {
        if (value.id === sender_id) {
          users.splice(key, 1);
          console.log(key, value, sender_id, users);
        }
      })
      return users;
    }
  }
}
</script>

<style scoped>

</style>