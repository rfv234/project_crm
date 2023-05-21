<template>
    <table>
        <tr>
            <h2 class="tasks">{{ name }}</h2>
        </tr>
        <tr>
            <h3 class="tasks">{{ job }}</h3>
        </tr>
    </table>
    <div v-for="task in tasks" class="divs">
        <strong class="tasks" v-if="task.status!=='в разработке'">{{ task.taskName }}</strong>
        <input class="tasks" v-if="task.status=='в разработке'" v-model="task.taskName">
        <div class="tasks">
            <span v-if="task.status!=='в разработке'">{{ task.description }}</span>
            <input v-if="task.status=='в разработке'" v-model="task.description">
        </div>
        <hr>
        <select class="tasks" v-bind:name="task.taskName" v-model="task.status">
            <option
                v-for="tasksStatus in tasksStatuses"
                v-bind:selected="tasksStatus==task.status"
                v-bind:value="tasksStatus">
                {{ tasksStatus }}
            </option>
        </select>
        <select>
            <option
                v-for="user in users"
                v-bind:value="user.id">
                {{ user.name }}
            </option>
        </select>
    </div>
    <button @click="addTask()" id="add">Добавить задачу</button>
    <button @click="deleteTask()" id="delete">Удалить задачу</button>
    <img src="src/assets/images/ochertanie.png" id="chel">
</template>

<script>
export default {
    name: "VueHomePage",
    data() {
        return {
            name: 'Имя сотрудника: ',
            job: 'Должность: ',
            is_boss: true,
            tasks: [
                {
                    taskName: 'Тестовая задача:',
                    description: 'Описание задачи:',
                    status: 'Отложена',
                    user_id: 1,
                }
            ],
            tasksStatuses: [
                'В разработке',
                'Выполняется',
                'На проверке',
                'Выполнена',
                'Отложена',
                'Отменена'
            ],
            users: [
                {
                    id: 1,
                    name: 'Я'
                },
                {
                    id: 2,
                    name: 'Андрей'
                },
                {
                    id: 3,
                    name: 'Алексей'
                },
                {
                    id: 4,
                    name: 'Сергей'
                }
            ]

        }
    },
    methods: {
        addTask: function () {
            this.tasks.push({
                taskName: 'Тестовая задача: ' + (this.tasks.length + 1),
                description: 'Описание задачи: ',
                status: 'В разработке',
                user_id: 1,
            });
        },
        deleteTask: function () {
            this.tasks.splice(-1, 1);
        }
    }
}

</script>

<style scoped>
.divs {
    margin-left: 15px;
    padding: 5px;
    border: solid 2px;
    margin-top: 10px;
    width: 50%;
}

.tasks {
    margin: 10px;
}

#chel {
    width: 170px;
    height: 170px;
    position: absolute;
    left: 60%;
    top: 10px;
}

#add {
    margin: 15px;
}
</style>
