<template>

    <card :icon="icon"
          refresh
          scrollable
          :search="events.length > 1"
          :title="title || __('Events')"
          :overlay="loading"
          @refresh="get()"
          :collapsed="!open || isEmpty"
          ref="card"
          @query-update="query = $event"
          @expand="isEmpty
            ? $refs.card.collapse()
            : null"
          :badge="count"
          :controls="1">
        <card-control slot="control-1"
                      @click="create()">
            <span class="icon is-small">
                <fa icon="plus-square"/>
            </span>
        </card-control>
        <div class="has-padding-medium wrapper">
            <div class="columns is-multiline">
                <event-form
                        v-if="form"
                        :id="id"
                        :type="type"
                        :form="form"
                        @close="form = null"
                        @destroy="get(); form=false"
                        @submit="get();form=false"/>

                <div class="column is-half-widescreen is-one-third-fullhd"
                     v-for="(event, index) in filteredEvents"
                     :key="index">
                    <event
                            :event="event"
                            @edit="edit(event)"
                            @delete="destroy(event, index)"
                            :index="index"
                            :type="type"
                            :id="id"/>
                </div>
            </div>
        </div>
    </card>

</template>

<script>

import fontawesome from '@fortawesome/fontawesome';
import { faAddressCard, faPlusSquare } from '@fortawesome/fontawesome-free-solid/shakable.es';
import Card from '../bulma/Card.vue';
import CardControl from '../bulma/CardControl.vue';
import Event from './Event.vue';
import EventForm from './EventForm.vue';

fontawesome.library.add(faAddressCard, faPlusSquare);

export default {
    name: 'Events',

    components: {
        Card, CardControl, Event, EventForm,
    },

    props: {
        id: {
            type: Number,
            required: true,
        },
        type: {
            type: String,
            required: true,
        },
        open: {
            type: Boolean,
            default: false,
        },
        title: {
            type: String,
            default: null,
        },
    },

    data() {
        return {
            loading: false,
            query: '',
            events: [],
            form: null,
        };
    },

    computed: {
        filteredEvents() {
            return this.query
                ? this.events.filter(event => event.first_name.toLowerCase()
                    .indexOf(this.query.toLowerCase()) > -1
                        || event.last_name.toLowerCase().indexOf(this.query.toLowerCase()) > -1)
                : this.events;
        },
        count() {
            return this.events.length;
        },
        isEmpty() {
            return this.count === 0;
        },
        icon() {
            return faAddressCard;
        },
    },

    created() {
        this.get();
    },

    methods: {
        get() {
            this.loading = true;

            axios.get(route('events.index'), {
                params: { event_id: this.id, event_type: this.type },
            }).then(({ data }) => {
                this.events = data;
                this.loading = false;
                this.$refs.card.resize();
            }).catch(error => this.handleError(error));
        },
        destroy(event, index) {
            this.loading = true;

            axios.delete(route('events.destroy', event.id))
                .then(() => {
                    this.events.splice(index, 1);
                    this.loading = false;
                }).catch(error => this.handleError(error));
        },
        create() {
            this.loading = true;

            if (!this.$refs.card.expanded) {
                this.$refs.card.toggle();
            }

            const params = { event_id: this.id, event_type: this.type };

            axios.get(route('events.create', params))
                .then(({ data }) => {
                    this.loading = false;
                    this.form = data.form;
                }).catch(error => this.handleError(error));
        },
        edit(event) {
            this.loading = true;

            axios.get(route('events.edit', event.id))
                .then(({ data }) => {
                    this.loading = false;
                    this.form = data.form;
                }).catch(error => this.handleError(error));
        },
    },
};

</script>

<style scoped>

    .wrapper {
        max-height: 415px;
        overflow-y: auto;
    }
</style>
