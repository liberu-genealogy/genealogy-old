<template>
    <div class="box has-background-light has-padding-medium raises-on-hover">
        <h4 class="title is-4 has-text-centered has-margin-top-large">
            <span class="icon">
                <fa icon="user"
                    size="xs"/>
            </span>
            some
            <span>
                test
            </span>
        </h4>
    </div>
</template>

<script>

export default {
    name: 'Show',

    data() {
        return {
            profile: null,
        };
    },
    computed: {
        fetchLink() {
            return 'api/profile/show';
        },
    },

    created() {
        this.fetch();
    },
    methods: {
        fetch() {
            const params = {};
            axios.get(this.fetchLink, { params })
                .then(response => (this.profile = response.data.user))
                .catch();
        },
    },
};
</script>

<style lang="scss">
</style>
