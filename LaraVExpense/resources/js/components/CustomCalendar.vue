<script setup lang="ts">
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import timeGridPlugin from '@fullcalendar/timegrid';
import FullCalendar from '@fullcalendar/vue3';
import { reactive, ref } from 'vue';
import { INITIAL_EVENTS } from '../../data/CustomData';
import AddTransDialog from './AddTransDialog.vue';

const calendarOptions = reactive({
    plugins: [
        dayGridPlugin,
        timeGridPlugin,
        interactionPlugin, // needed for dateClick
    ],
    headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay',
    },
    height: 1200,
    initialView: 'dayGridMonth',
    initialEvents: INITIAL_EVENTS, // alternatively, use the `events` setting to fetch from a feed
    editable: false,
    selectable: true,
    selectMirror: false,
    dayMaxEvents: true,
    weekends: true,
    select: handleDateSelect,
    eventClick: handleEventClick,
    eventsSet: handleEvents,
    eventClassNames: (arg) =>
        arg.event.extendedProps.type === 'income' ? 'income' : 'expense',
    /* you can update a remote database when these fire:
        eventAdd:
        eventChange:
        eventRemove:
        */
});

const currentEvents = ref([]);
const isOpen = ref(false);

function handleDateSelect(selectInfo) {
    isOpen.value = true;
    // let title = prompt('Please enter a new title for your event');
    // let calendarApi = selectInfo.view.calendar;
    // calendarApi.unselect(); // clear date selection
    // if (title) {
    //     calendarApi.addEvent({
    //         id: createEventId(),
    //         title,
    //         start: selectInfo.startStr,
    //         end: selectInfo.endStr,
    //         allDay: selectInfo.allDay,
    //     });
    // }
}

function handleEventClick(clickInfo) {
    if (
        confirm(
            `Are you sure you want to delete the event '${clickInfo.event.title}'`,
        )
    ) {
        clickInfo.event.remove();
    }
}

function handleEvents(events) {
    currentEvents.value.push(events);
}
</script>

<template>
    <div class="demo-app">
        <div class="demo-app-main">
            <AddTransDialog v-model:is-open="isOpen" />
            <FullCalendar class="demo-app-calendar" :options="calendarOptions">
                <template v-slot:eventContent="arg">
                    <p>{{ arg.event.title }}</p>
                    <p>{{ arg.event.extendedProps.amount }}</p>
                </template>
            </FullCalendar>
        </div>
    </div>
</template>

<style lang="css">
.income {
    background-color: var(--color-income);
    border: 0px;
    padding: 2px;
}

.expense {
    background-color: var(--color-expense);
    border: 0px;
    padding: 2px;
}

.fc .fc-button-primary,
.fc .fc-button-primary:hover {
    background-color: var(--color-blue-500);
    border-color: var(--color-blue-500);
    color: var(--color-white);
}

.fc .fc-button-primary:not(:disabled).fc-button-active,
.fc .fc-button-primary:not(:disabled):active {
    background-color: var(--color-blue-800) !important;
    border-color: var(--color-blue-800);
    color: var(--color-white);
}

.fc-button-group button {
    background-color: blue !important;
    border: 0;
}

.fc .fc-button-primary:not(:disabled).fc-button-active:focus,
.fc .fc-button-primary:not(:disabled):active:focus {
    box-shadow: rgba(154, 199, 244, 0.25) 0px 0px 0px 0rem;
}

.fc .fc-button-primary:focus,
.fc .fc-button:focus {
    box-shadow: rgba(76, 91, 106, 0.5) 0px 0px 0px 0rem;
}

.fc-h-event .fc-event-main {
    padding: 3px;
    font-size: 0.8rem;
    font-weight: 400;
    border-radius: 100%;
}

/* h2 {
    margin: 0;
    font-size: 16px;
    font-weight: 600;
}

ul {
    margin: 0;
    padding: 0 0 0 1.5em;
}

li {
    margin: 1.5em 0;
    padding: 0;
}

b {
    /* used for event dates/times */
/* margin-right: 3px; */
/* }  */

.demo-app {
    display: flex;
    min-height: 100%;
    font-family:
        Arial,
        Helvetica Neue,
        Helvetica,
        sans-serif;
    font-size: 14px;
}

.demo-app-sidebar {
    width: 300px;
    line-height: 1.5;
    background: #eaf9ff;
    border-right: 1px solid #d3e2e8;
}

.demo-app-sidebar-section {
    padding: 2em;
}

.demo-app-main {
    flex-grow: 1;
    padding: 3em;
}

.fc {
    /* the calendar root */
    max-width: 1100px;
    margin: 0 auto;
}
</style>
