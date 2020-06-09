<template>
    <div class="columns is-multiline">
        <div class="column is-one-third">
            <chart-card class="is-rounded raises-on-hover has-margin-bottom-large"
                source="/api/dashboard/pie"/>
        </div>
    </div>
</template>

<script>

import { EnsoChartCard as ChartCard } from '@enso-ui/bulma';

export default {
    name: 'Index',

    components: { ChartCard },
};

</script>
