import { OpenStreetMapProvider } from "leaflet-geosearch";

const provider = new OpenStreetMapProvider();

document.addEventListener("DOMContentLoaded", () => {
    if (document.querySelector("#mapa")) {
        const lat = 19.2653741;
        const lng = -98.9576679;

        const mapa = L.map("mapa").setView([lat, lng], 16);

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution:
                '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mapa);

        let marker;

        // agregar el pin
        marker = new L.marker([lat, lng], {
            draggable: true,
            autoPan: true
        }).addTo(mapa);

        // Geocode Service
        const geocodeService = L.esri.Geocoding.geocodeService();

        //Buscador de direcciones
        const buscador = document.querySelector("#formbuscador");
        buscador.addEventListener("blur", buscarDireccion);

        //Detectar movimiento del marker
        marker.on("moveend", function(e) {
            marker = e.target;
            const posicion = marker.getLatLng();

            //centrar automaticamente
            mapa.panTo(new L.LatLng(posicion.lat, posicion.lng));

            // Reverse GeoCoding, cuando el usuario reubica el pin
            geocodeService
                .reverse()
                .latlng(posicion, 16)
                .run(function(error, resultado) {
                    //console.log(error);

                    //console.log(resultado.address);

                    marker.bindPopup(resultado.address.LongLabel);
                    marker.openPopup();

                    llenarInputs(resultado);
                });
        });

        function buscarDireccion(e) {
            if (e.target.value.length > 10) {
                provider
                    .search({ query: e.target.value + ' Valle de Chalco Solidaridad MX ' })
                    .then(resultado => {
                        if (resultado) {
                            // Reverse GeoCoding, cuando el usuario reubica el pin
                            //console.log(resultado);
                            geocodeService
                                .reverse()
                                .latlng(resultado[0].bounds[0], 16)
                                .run(function(error, resultado) {
                                    //console.log(error);

                                    console.log(resultado);

                                    //marker.bindPopup(
                                      //  resultado.address.LongLabel
                                    //);
                                    //marker.openPopup();

                                    //llenarInputs(resultado);
                                });
                        }
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        }

        function llenarInputs(resultado) {
            document.querySelector("#direccion").value =
                resultado.address.Address || "";
            document.querySelector("#colonia").value =
                resultado.address.Neighborhood || "";
            document.querySelector("#lat").value = resultado.latlng.lat || "";
            document.querySelector("#lng").value = resultado.latlng.lng || "";
        }
    }
});
