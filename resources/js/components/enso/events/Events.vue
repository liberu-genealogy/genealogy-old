<template>

    <div class="wrapper">
        <div class="controls"
             v-if="controls">
            <button class="button"
                    @click="create()">
                <span v-if="!isMobile">
                    {{ __('New Event') }}
                </span>
                <span class="icon">
                    <fa icon="plus"/>
                </span>
            </button>
            <button class="button has-margin-left-small"
                    @click="fetch()">
                <span v-if="!isMobile">
                    {{ __('Reload') }}
                </span>
                <span class="icon">
                    <fa icon="sync"/>
                </span>
            </button>
            <p class="control has-icons-left has-icons-right has-margin-left-large">
                <input class="input is-rounded"
                       type="text"
                       v-model="internalQuery"
                       :placeholder="__('Filter')">
                <span class="icon is-small is-left">
                    <fa icon="search"/>
                </span>
                <span class="icon is-small is-right clear-button"
                      v-if="internalQuery"
                      @click="internalQuery = ''">
                    <a class="delete is-small"/>
                </span>
            </p>
        </div>
        <div class="columns is-multiline"
             :class="{'has-margin-top-large': controls}">
            <div class="column is-half-tablet is-one-third-widescreen"
                 v-for="(event, index) in filteredEvents"
                 :key="index">
                <event-card :event="event"
                              @set-default="setDefault(event)"
                              @edit="edit(event)"
                              @delete="destroy(event, index)"
                              :key="index">
                    <template slot="event"
                              :event="event">
                        <slot name="event"
                              :event="event"/>
                    </template>
                </event-card>
            </div>
        </div>
        <event-form
                :form="form"
                @close="form = null"
                @delete="fetch();form = null"
                @submit="fetch();form = null"
                ref="form"
                v-if="form">
            <template v-for="field in customFields"
                      :slot="field.name"
                      slot-scope="{ field, errors }"
                      v-if="field.meta.custom">
                <slot :name="field.name"
                      :field="field"
                      :errors="errors"/>
            </template>
        </event-form>
    </div>

</template>

<script>

    import { mapState } from 'vuex';
    import { faPlus, faSync, faSearch } from '@fortawesome/free-solid-svg-icons';
    import { library } from '@fortawesome/fontawesome-svg-core';
    import EventCard from './EventsCard.vue';
    import EventForm from './EventForm.vue';

    library.add(faPlus, faSync, faSearch);

    export default {
        name: 'Events',

        components: { EventCard, EventForm },

        props: {
            id: {
                type: Number,
                required: true,
            },
            type: {
                type: String,
                default: null,
            },
            query: {
                type: String,
                default: '',
            },
            controls: {
                type: Boolean,
                default: false,
            },
        },

        data() {
            return {
                loading: false,
                events: [],
                form: null,
                internalQuery: '',
            };
        },

        computed: {
            ...mapState('layout', ['isMobile']),
            filteredEvents() {
                const query = this.internalQuery.toLowerCase();

                return query
                    ? this.events.filter(({ city, street }) =>
                        city.toLowerCase().indexOf(query) > -1
                        || street.toLowerCase().indexOf(query) > -1)
                    : this.events;
            },
            count() {
                return this.filteredEvents.length;
            },
            customFields() {
                return this.form && this.form.sections
                    .reduce((fields, section) => fields
                        .concat(section.fields.filter(field => field.meta.custom)), []);
            },
            params() {
                return {
                    eventable_id: this.id,
                    eventable_type: this.type,
                };
            },
        },

        watch: {
            count() {
                this.$emit('update');
            },
            query() {
                this.internalQuery = this.query;
            },
        },

        created() {
            this.fetch();
        },

        methods: {
            fetch() {
                this.loading = true;

                axios.get(
                    route('event.index'),
                    { params: this.params },
                ).then(({ data }) => {
                    this.events = data;
                    this.loading = false;
                    this.$emit('update');
                }).catch(error => this.handleError(error));
            },
            edit(event) {
                this.loading = true;

                axios.get(route('event.edit', event.id))
                    .then(({ data }) => {
                        this.form = data.form;
                        this.addFields();
                        this.$emit('form-loaded', this.form);
                        this.loading = false;
                    }).catch(error => this.handleError(error));
            },
            create() {
                this.loading = true;

                axios.get(route('event.create', this.params)).then(({ data }) => {
                    this.form = data.form;
                    this.addFields();
                    this.$emit('form-loaded', this.form);
                    this.loading = false;
                    this.$emit('update');
                }).catch(error => this.handleError(error));
            },
            setDefault(event) {
                this.loading = true;

                axios.patch(route('event.setDefault', event.id)).then(() => {
                    this.fetch();
                }).catch(error => this.handleError(error));
            },
            destroy(event, index) {
                this.loading = true;

                axios.delete(route('event.destroy', event.id)).then(() => {
                    this.loading = false;
                    this.events.splice(index, 1);
                    this.$emit('update');
                }).catch(error => this.handleError(error));
            },
            addFields() {
                this.field('eventable_type').value = this.type;
                this.field('eventable_id').value = this.id;
            },
            field(field) {
                return this.form.sections
                    .reduce((fields, section) => fields.concat(section.fields), [])
                    .find(item => item.name === field);
            },
        },
    };

</script>

<style lang="scss" scoped>

    .controls {
        display: flex;
        justify-content: center;
    }

</style>
