<template>
    <div class="container my-5">
        <h2 class="text-center mb-5">{{establecimiento.nombre}}</h2>
        <div class="row align-items-start">
            <div class="col-md-8">
                <img :src="`../storage/${establecimiento.imagen_principal}`" alt="imagen establecimiento">
                <p class="mt-3">{{establecimiento.descripcion}}</p>
            </div>
            <aside class="col-md-4 bg-primary">
                <div></div>
                <div class="p-4">
                    <h2 class="text-center text-white mt-2 mb-4">Más Información</h2>

                    <p class="text-white mt-1">
                        <span class="text-white mt-1">
                            Ubicación:
                        </span>
                        {{establecimiento.direccion}}
                    </p>
                    <p class="text-white mt-1">
                        <span class="text-white mt-1">
                            Colonia:
                        </span>
                        {{establecimiento.colonia}}
                    </p>
                    <p class="text-white mt-1">
                        <span class="text-white mt-1">
                            Horario:
                        </span>
                        {{establecimiento.apertura}} - {{establecimiento.cierre}}
                    </p>
                    <p class="text-white mt-1">
                        <span class="text-white mt-1">
                            Telefono:
                        </span>
                        {{establecimiento.telefono}}
                    </p>
                </div>
            </aside>
        </div>
    </div>
</template>

<script>
export default {

    mounted(){
        console.log(this.$route.params);
        const {id} = this.$route.params;
        axios.get('/api/establecimientos/'+ id)
            .then(respuesta => {
                this.$store.commit("AGREGAR_ESTABLECIMIENTO",respuesta.data);
            });
    },
    computed:{
        establecimiento(){
            return this.$store.getters.obtenerEstablecimiento;
        }
    }
}
</script>
