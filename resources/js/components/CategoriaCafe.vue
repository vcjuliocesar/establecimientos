<template>
    <div class="container my-5">
        <h2>Café</h2>
        <div class="row">
            <div class="col-md-4 mt-4" v-for="cafe in this.cafes" v-bind:key="cafe.id">
                <div class="card">
                    <img class="card-img-top" :src="`storage/${cafe.imagen_principal}`" alt="card-cafe">
                    <div class="card-body">
                        <h3 class="card-title text-primary font-weight-bold">
                            {{cafe.nombre}}
                        </h3>
                        <p class="card-text">{{cafe.direccion}}</p>
                         <p class="card-text">
                             <span class="font-weight-bold">Horario:</span>
                             {{cafe.apertura}} - {{cafe.cierre}}
                         </p>
                         <a class="btn btn-primary d-block">Ver lugar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    mounted(){
        axios.get('/api/categorias/cafe')
            .then(respuesta => {
                this.$store.commit("AGREGAR_CAFES",respuesta.data);
            })
    },
    computed:{
        cafes(){
            return this.$store.state.cafes;
        }
    }
}
</script>
