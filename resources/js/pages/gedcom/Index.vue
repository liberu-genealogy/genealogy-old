<template>
    <div>
      <input
        type="file"
        style="display:none"
        @change="selectedFile"
        ref="fileInput">
      <button @click="$refs.fileInput.click()">Select Gedcom File</button>
      <button v-if="file" @click="uploadFile">Upload</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            file: null,
        };
    },

    computed: {
        uploadLink() {
            return window.location.origin + '/api/gedcom/store';
        },
    },

    created() {},

    methods: {
        selectedFile(event) {
            this.file = event.target.files[0];
        },
        uploadFile() {
            const fd = new FormData();
            fd.append('file', this.file, 'file.ged');
            axios.post(this.uploadLink, fd).then(res => console.log(res));
        },
    },
};
</script>

<style lang="scss" scoped>
</style>
