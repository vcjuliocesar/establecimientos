document.addEventListener('DOMContentLoaded', () => {

    const lat = 19.2653741;
    const lng = -98.9576679;

    const mapa = L.map('mapa').setView([lat, lng], 16);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mapa);

    let marker;

    // agregar el pin
    marker = new L.marker([lat, lng],{
        draggable:true,
        autoPan:true
    }).addTo(mapa);

    //Detectar movimiento del marker
    marker.on('moveend',function(e){
        marker = e.target;
        const posicion = marker.getLatLng();

        //centrar automaticamente
        mapa.panTo(new L.LatLng(posicion.lat,posicion.lng));
    });

});
