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

        function llenarInputs(resultado) {
            document.querySelector('#direccion').value=resultado.address.Address || '';
            document.querySelector('#colonia').value=resultado.address.Neighborhood || '';
            document.querySelector('#lat').value=resultado.latlng.lat || '';
            document.querySelector('#lng').value=resultado.latlng.lng || '';
        }
    }
});
