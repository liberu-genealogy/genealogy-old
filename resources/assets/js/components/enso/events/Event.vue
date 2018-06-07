<template>
    <card fixed>
        <div class="template has-padding-medium">
            <p class="title is-5">
                {{ event.name }}
                <span class="tag is-success is-pulled-right"
                    :class="event.is_active ? 'is-success' : 'is-danger'">
                    <fa :icon="event.is_active ? 'check' : 'times'"/>
                </span>
            </p>
            <p>
                <span class="icon is-small"
                    v-if="event.date">
                    <fa icon="stick-note"/>
                </span>
                {{ event.date }}
            </p>
            <p>
                <span class="icon is-small"
                    v-if="event.description">
                    <fa icon="sticky-note"/>
                </span>
                {{ event.description }}
            </p>
        </div>

        <card-footer slot="footer">
            <card-footer-item>
                <a @click="$emit('edit')">
                    {{ __('edit') }}
                </a>
            </card-footer-item>
            <card-footer-item>
                <popover @confirm="$emit('delete')">
                    <a>{{ __('delete') }}</a>
                </popover>
            </card-footer-item>
        </card-footer>
    </card>

</template>

<script>

import fontawesome from '@fortawesome/fontawesome';
import { faCheck, faTimes, faEnvelope, faPhone, faStickyNote }
    from '@fortawesome/fontawesome-free-solid/shakable.es';
import EventForm from './EventForm.vue';
import Card from '../bulma/Card.vue';
import CardFooter from '../bulma/CardFooter.vue';
import CardFooterItem from '../bulma/CardFooterItem.vue';
import Popover from '../bulma/Popover.vue';

fontawesome.library.add([
    faCheck, faTimes, faEnvelope, faPhone, faStickyNote,
]);

export default {
    name: 'Event',

    components: {
        Card, CardFooter, CardFooterItem, EventForm, Popover,
    },

    props: {
        event: {
            type: Object,
            required: true,
        },
    },
};

</script>

<style scoped>

    .template {
        height: 9em;
    }

</style>

