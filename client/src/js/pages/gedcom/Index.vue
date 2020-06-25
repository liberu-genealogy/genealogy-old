<template>
    <div>
        <div>
            <input
                type="text"
                :value.prop="slug"/>
            <input
                type="file"
                style="display:none"
                @change="selectedFile"
                ref="fileInput"
                accept="GED"/>
            <button @click="$refs.fileInput.click()">Select Gedcom File</button>
            <button v-if="file" @click="uploadFile">Upload</button>
        </div>
        <div v-if="uploadPercentage">
            <span class="ml-1">Upload</span>
            <progress
                max="100"
                :value.prop="uploadPercentage"/>
            <span :value.prop="total">{{ uploadPercentage }}%</span>
        </div>
        <div v-if="total">
            <span class="ml-1">Import</span>
            <progress
                :max.prop="total"
                :value.prop="complete"/>
            <span :value.prop="total">{{ complete }}/{{ total }}</span>
        </div>
    </div>
</template>
<script>
import Pusher from 'pusher-js'; // import Pusher

export default {

    data() {
        return {
            file: null,
            uploadPercentage: 0,
            total: 0,
            complete: 0,
            slug: null,
        };
    },

    computed: {
        uploadLink() {
            return '/api/gedcom/store';
        },
        getProgressLink() {
            return '/api/gedcom/progress';
        },
    },
    created() {
        this.subscribe();
        this.getProgressData();
    },
    methods: {
        subscribe() {
            const pusher = new Pusher(this.PUSHER_KEY, { cluster: this.PUSHER_CLUSTER });
            pusher.subscribe('gedcom-progress');
            pusher.bind('newMessage', data => {
                const { slug, total, complete } = data;
                if (slug === this.slug) {
                    this.slug = slug;
                    this.total = total;
                    this.complete = complete;
                }
            });
        },
        selectedFile(event) {
            [this.file] = event.target.files;
            this.uploadPercentage = 0;
            this.total = 0;
            this.slug = Math.random().toString(36).substring(2, 15)
             + Math.random().toString(36).substring(2, 15);
        },
        uploadFile() {
            const fd = new FormData();
            fd.append('slug', this.slug);
            fd.append('file', this.file, 'file.ged');
            axios
                .post(this.uploadLink, fd, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    },
                    onUploadProgress: function (progressEvent) {
                        const pe = Math.round((progressEvent.loaded / progressEvent.total) * 100);
                        this.uploadPercentage = parseInt(pe, 10);
                    }.bind(this),
                })
                .then()
                .catch();
        },
        // getProgressData() {
        //     const params = {};
        //     axios
        //         .get(this.getProgressLink, { params })
        //         .then(res => {
        //             const data = JSON.parse(res);
        //             this.slug = data.slug;
        //         })
        //         .catch();
        // },
    },
};
</script>

<style lang="scss" scoped></style>
