<template>
  <img src="\images\bgfb-54.png" id="ngsup">
  <div id="upblock">
    <a href="/users_list">
      <button class="upnews">Перейти к списку всех пользователей</button>
    </a>
    <a href="/create_user/1" v-if="cancreatenewuser">
      <button class="upnews">Создать нового пользователя</button>
    </a>
    <a href="/create_user/0">
      <button class="upnews">Редактировать данные пользователя</button>
    </a>
  </div>
  <hr>
  <div class="create">
    <a href='/create_news' v-if="cancreate">
      <button class="upnews">Создать новость</button>
    </a>
  </div>
  <hr>
  <div id="all_news">
    <h3>Все новости</h3>
    <hr>
    <div v-for="novelty in news">
      <a v-bind:href=novelty.item_url>
        <span>{{ novelty.name }}</span>
      </a>
      <hr>
    </div>
  </div>
  <div v-for="item in news" id="news">
    <a v-bind:href=item.item_url>
      <h2>{{ item.name }}</h2>
    </a>
    <br>
    <img v-if="item.photo" v-bind:src=item.photo>
    <br>
    <span>{{ item.text }}</span>
    <br>
    <span>Автор: {{ this.users[item.author_id - 1].name }}</span>
    <div class="edit">
      <a v-bind:href=item.url class="url" v-if="canupdate">
        <button class="downnews">Редактировать</button>
      </a>
    </div>
  </div>
</template>

<script>
export default {
  name: "VueNews",
  props: [
    'news',
    'users',
    'canupdate',
    'cancreate',
    'currentuser'
  ],
  data() {
    return {
      canupdate: this.canupdate,
      cancreate: this.cancreate,
      cancreatenewuser: this.currentuser === 1
    }
  },
  mounted() {

  }
}
</script>

<style scoped>

#ngsup {
  width: 100%;
  height: 300px;
}

#all_news {
  width: 230px;
  position: absolute;
  left: 15%;
  font-family: sans-serif;
}

#news {
  border: solid 2px;
  margin-top: 15px;
  margin-left: 30%;
  padding: 10px;
  width: 700px;
  font-size: 18px;
  font-family: sans-serif;
}

img {
  width: 700px;
  height: 400px;
}

.edit {
  width: 100%;
  display: flex;
  flex-direction: row;
  justify-content: right;
}

.create {
  width: 100%;
  display: flex;
  flex-direction: row;
  justify-content: center;
}

.url {
  display: block;
}

.upnews {
  text-decoration: none;
  display: inline-block;
  color: white;
  padding: 20px 30px;
  margin: 10px 20px;
  border-radius: 10px;
  font-family: 'Montserrat', sans-serif;
  text-transform: uppercase;
  letter-spacing: 2px;
  background-image: linear-gradient(to right, #9EEFE1 0%, #4830F0 51%, #9EEFE1 100%);
  background-size: 200% auto;
  box-shadow: 0 0 20px rgba(0, 0, 0, .1);
  transition: .5s;
}

.upnews:hover {
  background-position: right center;
}

#upblock {
  text-align: center;
}

.downnews {
  text-decoration: none;
  display: inline-block;
  color: white;
  padding: 10px 15px;
  margin: 5px 10px;
  border-radius: 7px;
  font-family: 'Montserrat', sans-serif;
  text-transform: uppercase;
  letter-spacing: 2px;
  background-image: linear-gradient(to right, #9EEFE1 0%, #4830F0 51%, #9EEFE1 100%);
  background-size: 100% auto;
  box-shadow: 0 0 20px rgba(0, 0, 0, .1);
  transition: .5s;
}

a {
  text-decoration: none;
  color: white;
}
</style>