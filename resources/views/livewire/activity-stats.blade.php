<div>
    <div wire:ignore id="map-container" class="mb-8">
        <div id="map">
        </div>
    </div>
    <div class="grid grid-cols-6 mb-4">
        <div class="col-span-1 sm:col-span-1 pr-2">
            <label for="location" class="block text-sm leading-5 font-medium text-gray-700">Per Page</label>
            <select wire:model="perPage" id="location"
                    class="mt-1 form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 rounded-md">
                <option value="10">10</option>
                <option>15</option>
                <option>20</option>
            </select>
        </div>
    </div>
    <div class="pt-4 mr-8">
        {{ $tracks->links() }}
    </div>
    <script>
        document.addEventListener("livewire:load", function (event) {
            generateMap(@json($coordinates));
            Livewire.hook('message.processed', (message, component) => {
                generateMap(@json($coordinates));
            })
        });
    </script>
    @push('scripts')
        <script src="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js"></script>
        <script>
            mapboxgl.accessToken = '{{ env('MAPBOX_TOKEN') }}';

            var map = new mapboxgl.Map({
                container: 'map', // container ID
                style: 'mapbox://styles/mapbox/streets-v11', // style URL
                // zoom: 1 // starting zoom
            });

            var markers = [];

            function generateMap(coordinates) {

                for (var i = markers.length - 1; i >= 0; i--) {
                    markers[i].remove();
                }

                for (i = 0; i < coordinates.length; i++) {
                    var marker = new mapboxgl.Marker()
                        .setLngLat(coordinates[i])
                        .addTo(map);
                    markers.push(marker);
                }

                var bounds = new mapboxgl.LngLatBounds(
                    coordinates[0],
                    coordinates[0]
                );

                // Extend the 'LngLatBounds' to include every coordinate in the bounds result.
                for (var coord of coordinates) {
                    bounds.extend(coord);
                }

                map.fitBounds(bounds, {
                    padding: {top: 50, bottom: 50, left: 15, right: 5}
                });

            }
        </script>
    @endpush
</div>
