<template>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <form @submit.prevent>
        <div class="form-group">
          <label for="event_name">イベント名</label>
          <input type="text" id="event_name" class="form-control" v-model="newEvent.event_name">
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="start_date">開始日</label>
              <input
                type="date"
                id="start_date"
                class="form-control"
                v-model="newEvent.start_date"
              >
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="end_date">終了日</label>
              <input type="date" id="end_date" class="form-control" v-model="newEvent.end_date">
            </div>
          </div>
          <div class="col-md-6 mb-4" v-if="addingMode">
            <button class="btn btn-sm btn-primary" @click="addNewEvent">登録</button>
          </div>
          <template v-else>
            <div class="col-md-6 mb-4">
              <button class="btn btn-sm btn-success" @click="updateEvent">更新</button>
              <button class="btn btn-sm btn-danger" @click="deleteEvent">削除</button>
              <button class="btn btn-sm btn-secondary" @click="addingMode = !addingMode">閉じる</button>
            </div>
          </template>
        </div>
      </form>
    </div>
    <div class="col-md-8">
      <Fullcalendar
      @eventClick="showEvent"
      @dateClick="handleDateClick"
      :plugins="calendarPlugins"
      :events="events"
      :header ="{
        left: 'title',
        center: 'dayGridMonth, timeGridWeek, timeGridDay, listWeek',
        right: 'prev today next'
      }"
      :buttonText ="{
        today: '今日',
        month: '月',
        week: '週',
        day: '日',
        list: 'リスト'
      }"
      :selectable="true"
      @select="handleSelect"
      />
    </div>
  </div>
</div>
</template>

<style lang="css">
@import "~@fullcalendar/core/main.css";
@import "~@fullcalendar/daygrid/main.css";
@import "~@fullcalendar/timegrid/main.css";
.fc-title {
  color: #fff;
}
.fc-title:hover {
  cursor: pointer;
}
</style>


<script>

import Fullcalendar from '@fullcalendar/vue';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import timeGridPlugin from '@fullcalendar/timegrid';
import ListPlugin from '@fullcalendar/list';
import axios from "axios";

export default {
  components: {
    Fullcalendar // make the <FullCalendar> tag available
  },
  data() {
    return {
      calendarPlugins: [dayGridPlugin, interactionPlugin, timeGridPlugin, ListPlugin],
      events: "",
      newEvent: {
        event_name: "",
        start_date: "",
        end_date: ""
      },
        addingMode: true,
        indexToUpdate: ""
      };
  },
  created() {
    this.getEvents();
  },
  methods: {
      handleDateClick(arg) {
      alert(arg.date)
    },
    addNewEvent() {
      axios
        .post("/api/calendar", {
          ...this.newEvent
        })
        .then(data => {
          this.getEvents();
          this.resetForm();
        })
        .catch(err =>
          console.log("イベントを追加できません", err.response.data)
        );
    },
    showEvent(arg) {
      this.addingMode = false;
      const { id, title, start, end } = this.events.find(
          event => event.id === +arg.event.id
      );
      this.indexToUpdate = id;
      this.newEvent = {
        event_name: title,
        start_date: start,
        end_date: end
      };
    },
    updateEvent() {
      axios
        .put("/api/calendar/" + this.indexToUpdate, {
          ...this.newEvent
        })
        .then(resp => {
          this.resetForm();
          this.getEvents();
          this.addingMode = !this.addingMode;
        })
        .catch(err =>
          console.log("更新できません", err.response.data)
        );
    },
    deleteEvent() {
      axios
        .delete("/api/calendar/" + this.indexToUpdate)
        .then(resp => {
          this.resetForm();
          this.getEvents();
          this.addingMode = !this.addingMode;
        })
        .catch(err =>
          console.log("削除できませんでした", err.response.data)
        );
    },
    getEvents() {
      axios
        .get("/api/calendar")
        .then(resp => (this.events = resp.data.data))
        .catch(err => console.log(err.response.data));
    },
    resetForm() {
      Object.keys(this.newEvent).forEach(key => {
        return (this.newEvent[key] = "");
      });
    },
    handleSelect(arg) {
        console.log(arg.startStr)
    }
  },
  watch: {
    indexToUpdate() {
      return this.indexToUpdate;
    }
  }
};
</script>
