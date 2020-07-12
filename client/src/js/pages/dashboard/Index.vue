<template>
    <div class="columns is-multiline">
        <div class="column is-one-third">
            <chart-card class="is-rounded raises-on-hover has-margin-bottom-large"
                source="/api/dashboard/pie"/>
        </div>
        <div class="column is-one-third">
            <table class="fullwidth">
                <tr v-for="item in companies" :key="item.id">
                    <td class="p01">
                        <button class="button is-fullwidth is-info" @click="ChangeDB(item.id)">
                            Use Tree: {{item.name}}
                        </button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script>

import { EnsoChartCard as ChartCard } from '@enso-ui/bulma';

export default {
    name: 'Index',

    components: { ChartCard },

    data: () => ({
        companies: [],
    }),
    created() {
        this.getCompany();
    },
    computed: {
        getDBLink() {
            return '/api/dashboard/getdb';
        },
        changeDBLink() {
            return '/api/dashboard/changedb';
        },
    },
    methods: {
        getCompany() {
            const params = {};
            axios
                .post(this.getDBLink, { params })
                .then(result => {
                    this.companies = result.data.company;
                })
                .catch();
        },
        ChangeDB(companyid) {
            console.log('company', companyid);
            const params = {
                comid: companyid,
            };
            axios
                .post(this.changeDBLink, params)
                .then()
                .catch();
        },
    },
};

</script>
<style lang="scss">
.p01{
    padding:0.1em;
}
.fullwidth{
    width:100% !important;
}
</style>
