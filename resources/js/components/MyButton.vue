<template>
    <div>
        <div class="card-header">MyButton</div>        
    </div>
</template>

<script> 
    export default {
        mounted() {
            console.log('Component mounted.')
            axios.post('api/vue', {})
            .then(response => {
                this.test = response.data;
            });
        },

            data: function () {
                return{
                    test: null,
                }
            },
        
        props: [
            'text',
            'type',
        ]
    }
</script>
<style>
    .my-button{
        background-color:rgb(41, 57, 131);
        color: rgb(147, 184, 152);
        padding: 10px 20px;
        font-weight: bold;
    }
</style>
