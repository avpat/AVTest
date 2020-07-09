<template>
    <div class="container is-fluid">
        <!-- Add header -->
        <section class="hero is-green is-small has-text-centered is-primary">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title has-text-white">Units</h1>
                </div>
            </div>
        </section>
        <section>
            <article class="media">
                <div class="tile is-ancestor">
                    <div class="tile is-4 is-vertical is-parent">
                        <div class=" tile is-child box" v-if="thumbnail">
                            <img :src="thumbnail" class="img-responsive">
                        </div>
                    </div>
                    <div class="tile is-parent">
                        <div class="tile is-child box">
                            <div class="field">
                                <div class="file is-centered is-boxed has-name media-content">
                                    <label class="file-label">
                                        <input type="file" name="filename" class="file-input" id="inputFileUpload"
                                               v-on:change="onFileChange">
                                        <span class="file-cta">
                            <span class="file-icon">
                              <i class="fas fa-upload" value="Upload"></i>
                            </span>
                            <span class="file-label">
                              Drop your files here…
                            </span>
                        </span>
                                        <span class="file-name">
                            {{filename}}
                          </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </section>
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
