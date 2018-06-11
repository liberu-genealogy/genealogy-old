<template>
    <div>
        <div class="columns">
            <div class="column is-one-fifth">
                <vue-filter class="box"
                            :options="activeOptions"
                            icons
                            title="Active"
                            v-model="filters.events.is_active">
                </vue-filter>
            </div>

            <div class="column is-two-fifths">
                <date-interval-filter class="box"
                                      title="Dated between"
                                      :min="intervals.events.date.min"
                                      @update-min="intervals.events.date.min = $event"
                                      :max="intervals.events.date.max"
                                      @update-max="intervals.events.date.max = $event">
                </date-interval-filter>
            </div>
            <div class="column is-two-fifths">
                <date-interval-filter class="box"
                                      title="Created Between"
                                      :min="intervals.events.created_at.min"
                                      @update-min="intervals.events.created_at.min = $event"
                                      :max="intervals.events.created_at.max"
                                      @update-max="intervals.events.created_at.max = $event">
                </date-interval-filter>
            </div>

        </div>

        <vue-table class="box"
                   :path="path"
                   :filters="filters"
                   :intervals="intervals"
                   :i18n="__"
                   id="events">
        </vue-table>

    </div>
</template>

<script>
import store from '../../store';
import VueTable from '../../components/enso/vuedatatable/VueTable.vue';
import VueFilter from '../../components/enso/bulma/VueFilter.vue';
import VueSelectFilter from '../../components/enso/select/VueSelectFilter.vue';
import IntervalFilter from '../../components/enso/bulma/IntervalFilter.vue';
import DateIntervalFilter from '../../components/enso/bulma/DateIntervalFilter.vue';
import Tabs from '../../components/enso/bulma/Tabs.vue';
import Tab from '../../components/enso/bulma/Tab.vue';
import '../../modules/enso/directives/hljs';

export default {
    store,
    comments: true,

    props: ['scopes'],

    components: { VueTable, VueFilter, VueSelectFilter, IntervalFilter, DateIntervalFilter, Tabs, Tab },

    data() {
        return {
            path: route('events.initTable', [], false),

            showCode: false,
            activeOptions: [
                { value: true, label: 'check', class: 'has-text-success' },
                { value: false, label: 'times', class: 'has-text-danger' },
            ],

            filters: {
                events: {
                    is_active: null,
                },
            },
            intervals: {
                events: {
                    date: {
                        min: null,
                        max: null,
                        dbDateFormat: 'Y-m-d h:mm:ss',
                    },
                    created_at: {
                        min: null,
                        max: null,
                        dbDateFormat: 'Y-m-d h:mm:ss',
                    },
                },
            },
        };
    },
};
</script>
