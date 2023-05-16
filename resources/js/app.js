import {createApp} from "vue";
import AppTest from "./components/AppTest.vue";

require('./bootstrap')
const app = createApp({})
app.component('app-test', AppTest)
app.mount('#app')
