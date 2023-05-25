<?php get_template_part('framework/partials/footer-partials/footer-sidebars'); ?>
<?php get_template_part('framework/partials/footer-partials/copyright'); ?>

<?php wp_footer(); ?>
<?php if(is_page_template('page-templates/contact-page.php')): ?>
<script type="text/javascript">
    jQuery(document).ready(function(){
            var map = new GMaps({
                div: '#contact-google-map',
                lat: gmaps_params.lat,
                lng: gmaps_params.lon
            });

            GMaps.geocode({
                address:gmaps_params.full_address,
                callback: function(results, status){
                    if(status=='OK'){
                        var latlng = results[0].geometry.location;
                        map.setCenter(latlng.lat(), latlng.lng());
                        map.addMarker({
                            lat: latlng.lat(),
                            lng: latlng.lng(),
                            infoWindow: {
                                content: '<div id="map-infoWindow-content">'+gmaps_params.full_address+'</div>'
                            }
                        });
                    }
                }
            });


    });

</script>
<?php endif; ?>
</body>
</html>