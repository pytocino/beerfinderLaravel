window.onload = function () {
    function quitarMarca() {
        const attributionElements = document.querySelectorAll(
            ".leaflet-control-attribution.leaflet-control"
        );
        attributionElements.forEach((element) => {
            element.remove();
        });
    }

    function verMapa(longitude, latitude) {
        const mapa = L.map("mapa").setView([latitude, longitude], 15);
        L.tileLayer(
            "https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png",
            {
                attribution:
                    '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
                subdomains: "abcd",
                maxZoom: 20,
            }
        ).addTo(mapa);

        const miUbicacion = L.circle([latitude, longitude], {
            color: "red",
            fillColor: "red",
            fillOpacity: 1,
            radius: 12,
        }).addTo(mapa);

        locals.forEach(function (ubicacion) {
            const marcador = L.marker([
                ubicacion.latitude,
                ubicacion.longitude,
            ]).addTo(mapa);
            marcador.bindPopup(
                `<a href="${ubicacion.address}" target="_blank">${ubicacion.name}</a>`
            );
        });

        quitarMarca();
    }

    function obtenerCoordenadas(position) {
        const { longitude, latitude } = position.coords;
        verMapa(longitude, latitude);
    }

    function gestionError(error) {
        switch (error.code) {
            case error.UNKNOWN_ERROR:
                console.log("Error en la geolocalización");
                break;
            case error.PERMISSION_DENIED:
                console.log("El usuario no ha permitido la geolocalización");
                break;
            case error.POSITION_UNAVAILABLE:
                console.log("Geolocalización no está disponible");
                break;
            case error.TIMEOUT:
                console.log("El tiempo de espera ha expirado");
                break;
        }
    }

    function generarLocalizacion() {
        const opciones = {
            watch: true,
            setView: true,
            enableHighAccuracy: true,
            timeout: 6000,
            maximumAge: 4500,
        };
        navigator.geolocation.getCurrentPosition(
            obtenerCoordenadas,
            gestionError,
            opciones
        );
    }

    const botonCoordenadas = document.getElementById("coordenadasBoton");

    if (navigator.geolocation) {
        botonCoordenadas.addEventListener("click", generarLocalizacion);
    }
};
