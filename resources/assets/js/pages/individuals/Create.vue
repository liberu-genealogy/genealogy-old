<template>

    <div class="columns is-centered">
        <div class="column is-three-quarters">
            <vue-form-ss class="box animated fadeIn"
                :route-params="[$route.name, null, false]">
                <template slot="family_id" slot-scope="{ field, errors }">
                    <vue-select v-model="field.value"
                        :has-error="errors.has(field.name)"
                        @input="pivotParams.families.id=$event;errors.clear(field.name)"
                        :source="field.meta.source"/>
                </template>
                <template slot="event_id" slot-scope="{ field, errors }">
                    <vue-select v-model="field.value"
                        :pivot-params="pivotParams"
                        :has-error="errors.has(field.name)"
                        @input="errors.clear(field.name);"
                        :source="field.meta.source"/>
                </template>
            </vue-form-ss>
        </div>
    </div>

</template>

<script>

import VueFormSs from '../../components/enso/vueforms/VueFormSs.vue';
import VueSelect from '../../components/enso/select/VueSelect.vue';

export default {
    components: { VueFormSs, VueSelect },

    data() {
        return {
            pivotParams: { families: { id: null } },
        };
    },
};

</script>
