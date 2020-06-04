<template>
    <div>
        <div>
        <input
        type="file"
        style="display:none"
        @change="selectedFile"
        ref="fileInput"
        accept="GED"
        >
        <button @click="$refs.fileInput.click()">
            Select Gedcom File
        </button>
        <button v-if="file" @click="uploadFile">
            Upload
        </button>
        </div>
        <div>
            <progress max="100" :value.prop="uploadPercentage" v-if="uploadPercentage"/>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            file: null,
            uploadPercentage: 0,
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
            this.uploadPercentage = 0;
            console.log(this.uploadPercentage);
        },
        uploadFile() {
            const fd = new FormData();
            fd.append('file', this.file, 'file.ged');
            axios.post( this.uploadLink,
                fd,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    },
                    onUploadProgress: function( progressEvent ) {
                        this.uploadPercentage = parseInt( Math.round( ( progressEvent.loaded / progressEvent.total ) * 100 ));
                    }.bind(this)
                },
            ).then(function(){
                
            })
            .catch(function(){
                
            });
        },
    },
};
</script>

<style lang="scss" scoped>
</style>
