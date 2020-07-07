<template>
    <div class="container">
        <input type="file"   />
        <button class="btn btn-success btn-block" @click="uploadFile">Upload File</button>
    </div>

</template>

<script>
    import axios from "axios";

    export default {
        name: "FormUpload",
        props: {
            file: Object
        },
        data() {
            return {
                // status: this.file.status,
                // description: this.file.description
            };
        },
        methods: {
            uploadFile(e) {
                //make a post request
                this.file = e.target.file;
                axios.post(`/file-upload`, {file: this.file }).then(response => {
                    console.log(response);

                });

            },
        }
    };
</script>