<template>
<div v-for="item in news" id="news">
  <img v-if="item.photo" v-bind:src=item.photo>
  <h2>{{item.name}}</h2>
  <span>{{item.text}}</span>
</div>
</template>

<script>
export default {
  name: "VueNews",
  data() {
    return {
      news: [
        {
          photo: 'images/sw.jpg',
          name: 'Что нового в Швейцарии?',
          text: 'Всемирная туристская организация (UNWTO) опубликовала рейтинг самых посещаемых стран мира в 2022 году. России в этом списке нет, но из той же статистики видно, что по совокупным расходам на международные поездки граждане РФ обошли туристов из Швейцарии, Саудовской Аравии, Сингапура и многих других стран.'
        },
        {
          photo: null,
          name: 'Тестовая новость',
          text: 'Текст тестовой новости'
        }
      ],
    }
  }
}
</script>

<style scoped>
  #news {
    border: solid 2px;
    margin-top: 15px;
    padding: 10px;
  }
</style>