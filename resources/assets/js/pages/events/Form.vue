<template>

    <div>
        <vue-table class="box"
                   :path="path"
                   @edit-event="edit"
                   ref="events"
                   id="events"/>
        <event-form :form="form"
                      @close="form=null"
                      @destroy="$refs.events.getData(); form=null"
                      @submit="$refs.events.getData();form=null"
                      v-if="form"/>
    </div>

</template>

<script>
import fontawesome from '@fortawesome/fontawesome';
import { faAddressCard } from '@fortawesome/fontawesome-free-solid/shakable.es';
import VueTable from '../../components/enso/vuedatatable/VueTable.vue';
import EventForm from '../../components/enso/events/EventForm.vue';

fontawesome.library.add(faAddressCard);

export default {
    components: { VueTable, EventForm },

    data() {
        return {
            path: route('events.initTable'),
            form: null,
            event: {},
        };
    },

    methods: {
        edit(event) {
            this.$refs.events.loading = true;
            axios
                .get(route('events.edit', event.dtRowId))
                .then(({ data }) => {
                    this.$refs.events.loading = false;
                    this.form = data.form;
                })
                .catch(error => {
                    this.$refs.events.loading = false;
                    this.handleError(error);
                });
        },
    },
};
</script>
