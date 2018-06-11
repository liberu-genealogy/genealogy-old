<template>
    <div>
        <ul>
            <li v-for="individual in citations" :key="individual.id">
                <a v-bind:href="'/citations/' + individual.id">
                {{ individual.first_name }} {{ individual.last_name }}
                </a>
        </li>
        </ul>
    </div>
</template>

<script>
import fontawesome from '@fortawesome/fontawesome';
import {
    faTrashAlt,
    faUpload,
    faSignOutAlt,
    faEllipsisH,
    faEye,
    faPlus,
    faPencilAlt,
} from '@fortawesome/fontawesome-free-solid/shakable.es';

fontawesome.library.add([faTrashAlt, faUpload, faSignOutAlt, faEllipsisH, faEye, faPlus, faPencilAlt]);

export default {
    components: {},

    data() {
        return {
            citations: null,
        };
    },

    mounted() {
        axios
            .get(route(this.$route.name, this.$route.params.id))
            .then(response => {
                this.citations = response.data;
            })
            .catch(error => this.handleError(error));
    },
};
</script>

<style>
.has-lateral-borders {
    border-left: 1px solid rgba(0, 0, 0, 0.2);
    border-right: 1px solid rgba(0, 0, 0, 0.2);
}

.stat-value {
    font-size: 2em;
    padding-top: 12px;
}

.stat-key {
    font-size: 1.4em;
    font-weight: 200;
    padding-bottom: 8px;
}

.level.user-controls {
    margin-bottom: 0;
}

.individual-content {
    transition: all 1s ease;
}
</style>
