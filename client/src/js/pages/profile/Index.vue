<template>
    <div class="box has-background-light has-padding-medium raises-on-hover">
        <h4 class="title is-4 has-text-centered has-margin-top-large">
            <span class="icon">
                <fa icon="user"
                    size="xs"/>
            </span>
            {{ profile.person.name }}
            <span v-if="profile.person.appellative">
                ({{ profile.person.appellative }})
            </span>
        </h4>
        <divider class="has-margin-bottom"/>
        <div class="columns has-margin-top-large">
            <div class="column">
                <div class="columns is-mobile">
                    <div class="column">
                        <figure class="image is-128x128 avatar">
                            <img class="is-rounded"
                                :src="route('core.avatars.show', avatarId)">
                        </figure>
                    </div>
                    <div class="column">
                        <div class="has-margin-top-small field controls">
                            <a class="button is-fullwidth is-primary"
                                @click="updateAvatar">
                                <span class="icon">
                                    <fa icon="sync-alt"/>
                                </span>
                                <span>
                                    {{ i18n('Avatar') }}
                                </span>
                            </a>
                            <uploader @upload-successful="setUserAvatar($event.id)"
                                :url="route('core.avatars.store')"
                                file-key="avatar">
                                <template>
                                    <a class="button is-fullwidth is-info has-margin-top-small">
                                        <span class="icon">
                                            <fa icon="upload"/>
                                        </span>
                                        <span>
                                            {{ i18n('Avatar') }}
                                        </span>
                                    </a>
                                </template>
                            </uploader>
                            <a class="button is-fullwidth is-danger has-margin-top-small"
                                @click="logout">
                                <span class="icon">
                                    <fa icon="sign-out-alt"/>
                                </span>
                                <span>
                                    {{ i18n('Log out') }}
                                </span>
                            </a>
                            <a class="button is-fullwidth has-margin-top-small is-warning"
                                @click="$router.push({
                                    name: 'administration.users.edit',
                                    params: { user: profile.id },
                                })">
                                <span class="icon">
                                    <fa icon="pencil-alt"/>
                                </span>
                                <span>
                                    {{ i18n('Edit') }}
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <divider class="has-margin-large"
                    v-if="isMobile"/>
                <div class="columns is-mobile is-multiline details has-margin-top-large">
                    <div class="column is-one-third has-text-right has-padding-small">
                        <strong>{{ i18n('Group') }}:</strong>
                    </div>
                    <div class="column is-two-thirds has-padding-small">
                        <span class="has-margin-left-medium">
                            {{ profile.group.name }}
                        </span>
                    </div>
                    <div class="column is-one-third has-text-right has-padding-small">
                        <strong>{{ i18n('Role') }}:</strong>
                    </div>
                    <div class="column is-two-thirds has-padding-small">
                        <span class="has-margin-left-medium">
                            {{ profile.role.name }}
                        </span>
                    </div>
                    <div class="column is-one-third has-text-right has-padding-small">
                        <strong>{{ i18n('Email') }}:</strong>
                    </div>
                    <div class="column is-two-thirds has-padding-small">
                        <span class="has-margin-left-medium">
                            {{ profile.email }}
                        </span>
                    </div>
                    <div class="column is-one-third has-text-right has-padding-small">
                        <strong>{{ i18n('Phone') }}:</strong>
                    </div>
                    <div class="column is-two-thirds has-padding-small">
                        <span class="has-margin-left-medium">
                            {{ profile.person.phone }}
                        </span>
                    </div>
                    <div class="column is-one-third has-text-right has-padding-small">
                        <strong>{{ i18n('Birthday') }}:</strong>
                    </div>
                    <div class="column is-two-thirds has-padding-small">
                        <span class="has-margin-left-medium">
                            {{ dateFormat(profile.person.birthday) }}
                        </span>
                    </div>
                    <div class="column is-one-third has-text-right has-padding-small">
                        <strong>{{ i18n('Gender') }}:</strong>
                    </div>
                    <div class="column is-two-thirds has-padding-small">
                        <span class="has-margin-left-medium">
                            {{
                                profile.person.gender
                                    ? enums.genders._get(profile.person.gender)
                                    : null
                            }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <divider class="has-margin-large"/>
        <div class="level is-mobile has-margin-bottom-large">
            <div class="level-item has-text-centered has-right-border">
                <div>
                    <p class="subtitle is-3">
                        {{ profile.loginCount }}
                    </p>
                    <p class="subtitle is-4">
                        {{ i18n('logins') }}
                    </p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="subtitle is-3">
                        {{ profile.actionLogCount }}
                    </p>
                    <p class="subtitle is-4">
                        {{ i18n('actions') }}
                    </p>
                </div>
            </div>
            <div class="level-item has-text-centered has-left-border">
                <div>
                    <p class="subtitle is-3">
                        {{ profile.rating }}
                    </p>
                    <p class="subtitle is-4">
                        {{ i18n('rating') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapState, mapMutations, mapActions } from 'vuex';
import { library } from '@fortawesome/fontawesome-svg-core';
import {
    faUser, faSyncAlt, faTrashAlt, faUpload, faSignOutAlt, faPencilAlt,
} from '@fortawesome/free-solid-svg-icons';
import { Uploader } from '../../../../node_modules/@enso-ui/uploader/src/bulma/Uploader.vue';
import Divider from '../../../../node_modules/@enso-ui/divider/src/Divider.vue';
import format from '../../../../node_modules/@enso-ui/ui/src/modules/plugins/date-fns/format';

library.add(faUser, faSyncAlt, faTrashAlt, faUpload, faSignOutAlt, faPencilAlt);

export default {
    name: 'Index',

    inject: ['canAccess', 'errorHandler', 'i18n', 'route'],

    components: { Uploader, Divider },

    data: () => ({
        profile: null,
    }),
    created() {
        this.fetch();
    },
    computed: {
        ...mapState(['user', 'meta', 'enums', 'impersonating']),
        ...mapState('auth', ['isAuth']),
        ...mapState('layout', ['isMobile']),
        fetchLink() {
            return 'api/profile/show';
        },
        avatarId() {
            return this.profile.avatar.id;
        },
    },
    methods: {
        ...mapMutations(['setUserAvatar']),
        ...mapActions('auth', ['logout']),
        fetch() {
            axios.get(this.route('profile.show'))
                .then(response => (this.profile = response.data.user))
                .catch();
        },
        updateAvatar() {
            axios.patch(this.route('core.avatars.update', this.user.avatar.id))
                .then(({ data }) => this.setUserAvatar(data.avatarId))
                .catch(this.errorHandler);
        },
        dateFormat(date) {
            return date
                ? format(date, this.meta.dateFormat)
                : null;
        },
    },
};
</script>

<style lang="scss">
</style>
