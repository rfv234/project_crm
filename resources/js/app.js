import {createApp} from "vue";
import AppTest from "./components/AppTest.vue";
import VueButton from "./components/VueButton.vue";
import VueHomePage from "./components/VueHomePage.vue";
import VueNews from "./components/VueNews.vue";

require('./bootstrap')
const app = createApp({})
app.component('app-test', AppTest)
app.component('vue-button', VueButton)
app.component('vue-homepage', VueHomePage)
app.component('vue-news', VueNews)
app.mount('#app')
