<template>
    <h1>Establecimiento</h1>
</template>

<script>
export default {

    mounted(){
        console.log(this.$route.params);
        const {id} = this.$route.params;
        axios.get('/api/establecimientos/'+ id)
            .then(respuesta => {
                console.log(respuesta.data);
            })
    },
    computed:{
    }
}
</script>
