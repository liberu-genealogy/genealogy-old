<template>

    <div class="columns is-centered">
        <div class="column is-three-quarters">
            <vue-form-ss class="box animated fadeIn"
                         :route-params="[$route.name, $route.params.id, false]"
                         @loaded="initialised = true"
                         ref="form"/>
            <div v-if="initialised">
                <events type="individual" :id="$refs.form.data.params.individual_id" :open="true" />

                <contacts type="individual" :id="$refs.form.data.params.individual_id" :open="true" />

                <documents-card :id="$refs.form.data.params.individual_id"
                                type="individual"/>
                <addresses :id="$refs.form.data.params.individual_id"
                           type="individual"/>
                <comments-card :id="$refs.form.data.params.individual_id"
                               type="individual"
                                :open="true"/>
            </div>
        </div>
    </div>

</template>

<script>
import DocumentsCard from '../../components/enso/documents/DocumentsCard.vue';
import CommentsCard from '../../components/enso/comments/CommentsCard.vue';
import Addresses from '../../components/enso/addresses/Addresses.vue';
import Contacts from '../../components/enso/contacts/Contacts.vue';
import Events from '../../components/enso/events/Events.vue';
import VueFormSs from '../../components/enso/vueforms/VueFormSs.vue';
import VueSelect from '../../components/enso/select/VueSelect.vue';

export default {
    components: { VueFormSs, VueSelect, DocumentsCard, CommentsCard, Addresses, Contacts, Events },

    data() {
        return {
            initialised: false,
        };
    },
};

</script>
