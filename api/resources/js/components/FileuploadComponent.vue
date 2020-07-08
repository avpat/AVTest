<template>
    <div class="container">

        <div class="row input-group">
            <div class=" col-md-6 custom-file">
                <input type="file" name="file" class="custom-file-input" id="inputFileUpload"
                       v-on:change="onFileChange">
            </div>
            <div class=" col-md-6 input-group-append">
                <input type="submit" class="btn btn-primary" value="Upload" @click="uploadFile">
            </div>
        </div>
        <div class="row">
            <div class=" col-md-3" v-if="thumbnail">
                <img :src="thumbnail" class="img-responsive" height="70" width="90">
            </div>
        </div>


    </div>
</template>

<script>


    export default {
        mounted() {
            console.log('Component successfully mounted')
        },
        data() {
            return {
                file: '',
                thumbnail:''
            };
        },
        methods: {
            onFileChange(e) {
                this.filename = "Selected File: " + e.target.files[0].name;
                this.file = e.target.files[0];
                this.createThumbnail(this.file );
            },
            uploadFile(e) {
                //upload file and return message to console
                e.preventDefault();
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                };
                // form data
                let formData = new FormData();
                formData.append('file', this.file);
                axios.post(`/file-upload`, formData, config).then(response => {
                    console.log(response.data);

                }).catch(function (error) {
                    console.log(error.response.data);
                });
            },
            createThumbnail(file) {
                //create a thumbnail and display
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.thumbnail = e.target.result;
                };
                reader.readAsDataURL(file);
            },
        }
    };
</script>
