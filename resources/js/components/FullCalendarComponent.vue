<template>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <form @submit.prevent>
        <div class="form-group">
          <label for="event_name">Event Name</label>
          <input type="text" id="event_name" class="form-control" v-model="newEvent.event_name">
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="start_date">Start Date</label>
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
              <label for="end_date">End Date</label>
              <input type="date" id="end_date" class="form-control" v-model="newEvent.end_date">
            </div>
          </div>
          <div class="col-md-6 mb-4" v-if="addingMode">
            <button class="btn btn-sm btn-primary" @click="addNewEvent">Save Event</button>
          </div>
          <template v-else>
            <div class="col-md-6 mb-4">
              <button class="btn btn-sm btn-success" @click="updateEvent">Update</button>
              <button class="btn btn-sm btn-danger" @click="deleteEvent">Delete</button>
              <button class="btn btn-sm btn-secondary" @click="addingMode = !addingMode">Cancel</button>
            </div>
          </template>
        </div>
      </form>
    </div>
    <div class="col-md-8">
      <Fullcalendar @eventClick="showEvent" :plugins="calendarPlugins" :events="events"/>
    </div>
  </div>
</div>
</template>

<style lang="css">
@import "~@fullcalendar/core/main.css";
@import "~@fullcalendar/daygrid/main.css";
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
import axios from "axios";

export default {
  components: {
    Fullcalendar // make the <FullCalendar> tag available
  },
  data() {
    return {
      calendarPlugins: [dayGridPlugin, interactionPlugin],
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
    }
  },
  watch: {
    indexToUpdate() {
      return this.indexToUpdate;
    }
  }
};
</script>
