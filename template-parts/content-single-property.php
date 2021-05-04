<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $post;
$min_suffix_js = ere_get_option('enable_min_js', 0) == 1 ? '.min' : '';
wp_enqueue_script(ERE_PLUGIN_PREFIX . 'single-property', ERE_PLUGIN_URL . 'public/assets/js/property/ere-single-property' . $min_suffix_js . '.js', array('jquery'), ERE_PLUGIN_VER, true);

$min_suffix = ere_get_option('enable_min_css', 0) == 1 ? '.min' : '';
wp_print_styles( ERE_PLUGIN_PREFIX . 'single-property');

$property_id=get_the_ID();
$title = get_the_title($property_id);
$property_meta_data = get_post_custom( $property_id );
$property_identity         = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_identity' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_identity' ][0] : '';
$property_size         = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_size' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_size' ][0] : '';
$property_bedrooms    = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_bedrooms' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_bedrooms' ][0] : '0';
$property_bathrooms   = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_bathrooms' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_bathrooms' ][0] : '0';

$property_title = get_the_title();
$property_address     = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_address' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_address' ][0] : '';
$property_status = get_the_terms( $property_id, 'property-status' );
$property_price              = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_price' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_price' ][0] : '';
$property_price_short              = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_price_short' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_price_short' ][0] : '';
$property_price_unit             = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_price_unit' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_price_unit' ][0] : '';

$property_price_prefix      = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_price_prefix' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_price_prefix' ][0] : '';
$property_price_postfix      = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_price_postfix' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_price_postfix' ][0] : '';

$content = get_the_content();

$property_meta_data = get_post_custom($property_id);
$property_types = get_the_terms($property_id, 'property-type');
$property_type_arr = array();
if ($property_types) {
	foreach ($property_types as $property_type) {
		$property_type_arr[] = $property_type->name;
	}
}

$property_status_arr = array();
if ($property_status) {
	foreach ($property_status as $property_stt) {
		$property_status_arr[] = $property_stt->name;
	}
}

$property_features = get_the_terms($property_id, 'property-feature');

$property_label = get_the_terms($property_id, 'property-label');
$property_label_arr = array();
if ($property_label) {
	foreach ($property_label as $label) {
		$property_label_arr[] = $label->name;
	}
}
$property_identity = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_identity']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_identity'][0] : '';
$property_video = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_video_url']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_video_url'][0] : '';
$property_video_image = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_video_image']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_video_image'][0] : '';
$property_image_360 = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_image_360', true);
$property_image_360 = (isset($property_image_360) && is_array($property_image_360)) ? $property_image_360['url'] : '';
$property_virtual_tour = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_virtual_tour', true);
$property_virtual_tour_type = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_virtual_tour_type', true);
if (empty($property_virtual_tour_type)) {
	$property_virtual_tour_type = '0';
}
$price = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_price']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_price'][0] : '';
$price_short = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_price_short']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_price_short'][0] : '';
$price_unit = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_price_unit']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_price_unit'][0] : '';
$price_prefix = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_price_prefix']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_price_prefix'][0] : '';
$price_postfix = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_price_postfix']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_price_postfix'][0] : '';
$property_year = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_year']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_year'][0] : '';
$property_rooms = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_rooms']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_rooms'][0] : '0';
$property_bathrooms = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_bathrooms']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_bathrooms'][0] : '0';
$property_bedrooms = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_bedrooms']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_bedrooms'][0] : '0';
$property_garage_size = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_garage_size']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_garage_size'][0] : '';
$property_size = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_size']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_size'][0] : '';
$additional_features = isset($property_meta_data[ERE_METABOX_PREFIX . 'additional_features']) ? $property_meta_data[ERE_METABOX_PREFIX . 'additional_features'][0] : '';
$measurement_units = ere_get_measurement_units();
$measurement_units_land_area = ere_get_measurement_units_land_area();

$additional_feature_title = $additional_feature_value = null;
if ($additional_features > 0) {
	$additional_feature_title = get_post_meta($property_id, ERE_METABOX_PREFIX . 'additional_feature_title', true);
	$additional_feature_value = get_post_meta($property_id, ERE_METABOX_PREFIX . 'additional_feature_value', true);
}
$property_garage = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_garage']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_garage'][0] : '0';
$property_land = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_land']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_land'][0] : '';


$p_land_rai = round($property_land / 1600);
$p_temp_sqwa = $property_land % 1600;
$p_land_ngan = round($p_temp_sqwa / 400);
$p_land_sqwa = $p_temp_sqwa % 400;

$property_land_thaiunit = [
	$p_land_rai,
	$p_land_ngan,
    $p_land_sqwa
];

$additional_fields = ere_render_additional_fields();
wp_enqueue_script('bootstrap-tabcollapse');

$property_gallery = get_post_meta(get_the_ID(), ERE_METABOX_PREFIX . 'property_images', true);
wp_enqueue_style('owl.carousel');
wp_enqueue_script('owl.carousel');

$property_neighborhood = get_the_terms($property_id, 'property-neighborhood');
$property_neighborhood_arr = array();
if ($property_neighborhood) {
	foreach ($property_neighborhood as $neighborhood_item) {
		$property_neighborhood_arr[] = $neighborhood_item->name;
	}
}

$property_city = get_the_terms($property_id, 'property-city');
$property_city_arr = array();
if ($property_city) {
	foreach ($property_city as $city_item) {
		$property_city_arr[] = $city_item->name;
	}
}

$property_state = get_the_terms($property_id, 'property-state');
$property_state_arr = array();
if ($property_state) {
	foreach ($property_state as $state_item) {
		$property_state_arr[] = $state_item->name;
	}
}

$property_location = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_location', true);
$property_address = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_address']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_address'][0] : '';
$property_country = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_country']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_country'][0] : '';
$property_zip = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_zip']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_zip'][0] : '';

$location = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_location', true);
$lat = $lng = '';
if (!empty($location)) {
	list($lat, $lng) = explode(',', $location['location']);
} else {
	return;
}

if (empty($lat) || empty($lng)) {
	return;
}


$map_icons_path_marker = ERE_PLUGIN_URL . 'public/assets/images/map-marker-icon.png';
$default_marker = ere_get_option('marker_icon', '');
if ($default_marker != '') {
	if (is_array($default_marker) && $default_marker['url'] != '') {
		$map_icons_path_marker = $default_marker['url'];
	}
}
wp_enqueue_script('google-map');
$google_map_style = ere_get_option('googlemap_style', '');
$googlemap_zoom_level = ere_get_option('googlemap_zoom_level', '12');
$map_directions_distance_units = ere_get_option('map_directions_distance_units', 'metre');
wp_localize_script(ERE_PLUGIN_PREFIX . 'main', 'ere_property_map_vars',
	array(
		'google_map_style' => $google_map_style
	)
);
$map_id = 'map-' . uniqid();
$agent_display_option = isset($property_meta_data[ ERE_METABOX_PREFIX . 'agent_display_option' ]) ? $property_meta_data[ ERE_METABOX_PREFIX . 'agent_display_option' ][0] : '';

?>
<div id="property-<?php the_ID(); ?>" <?php post_class('ere-property-wrap single-property-area content-single-property'); ?>>
	<?php
	/**
	 * ere_single_property_before_summary hook.
	 */
	do_action( 'ere_single_property_before_summary' );
	?>
	<?php
	/**
	* ere_single_property_summary hook.
	*
	* @hooked single_property_header - 5
	* @hooked single_property_gallery - 10
	* @hooked single_property_description - 15
	* @hooked single_property_location - 20
	* @hooked single_property_features - 25
	* @hooked single_property_floors - 30
	* @hooked single_property_attachments - 35
	* @hooked single_property_map_directions - 40
	* @hooked single_property_nearby_places - 45
	* @hooked single_property_walk_score - 50
	* @hooked single_property_contact_agent - 55
	* @hooked single_property_footer - 90
	* @hooked comments_template - 95
	* @hooked single_property_rating - 95
	*/
	//do_action( 'ere_single_property_summary' );?>

    <div id="p-intro" class="single-property-element property-info-header">
        <div class="property-main-info" style="background-image: url(<?php if(has_post_thumbnail()) { the_post_thumbnail_url();} else { echo esc_url( get_template_directory_uri()) .'/img/thumb.jpg'; }?>)">

            <div class="property-heading" >
                <div class="s-container">
                <?php if ( ! empty( $property_title ) ): ?>
                    <h2 class="property-title"><?php the_title(); ?></h2>
				<?php endif; ?>
                    <div class="property-info-block">
                            <?php if (!empty( $property_price ) ): ?>
                                <span class="property-price">
                            <?php if(!empty( $property_price_prefix )) {echo '<span class="property-price-prefix">'.$property_price_prefix.' </span>';} ?>
                            <?php
                            echo ere_get_format_money( $property_price_short,$property_price_unit );
                            ?>
                            <?php if(!empty( $property_price_postfix )) {echo '<span class="property-price-postfix"> / '.$property_price_postfix.'</span>';} ?>
                        </span>
                            <?php elseif (ere_get_option( 'empty_price_text', '' )!='' ): ?>
                                <span class="property-price"><?php echo ere_get_option( 'empty_price_text', '' ) ?></span>
                            <?php endif; ?>
                            <?php
                            if ( $property_status ) : ?>
                                <div class="property-status">
                                    <?php foreach ( $property_status as $status ) :
                                        $status_color = get_term_meta($status->term_id, 'property_status_color', true);?>
                                        <span class="" style="background-color: <?php echo esc_attr($status_color) ?>"><?php echo esc_html( $status->name ); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        <?php if ( ! empty( $property_address ) ):
                            $property_location = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_location', true);
                            ?>
                            <div class="property-location" title="<?php echo esc_attr( $property_address ) ?>">
                                <i class="fa fa-map-marker"></i>
                                <span><?php echo esc_attr($property_address) ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>


        </div>
    </div>

    <div id="p-info">
        <div class="s-container">
            <div class="property-info s-grid -m1 -d4">
                <div class="property-id">
                    <span class="fa fa-barcode"></span>
                    <div class="content-property-info">
                        <p class="property-info-value"><?php
							if(!empty($property_identity))
							{
								echo esc_html($property_identity);
							}
							else
							{
								echo esc_html($property_id);
							}
							?></p>
                        <p class="property-info-title"><?php esc_html_e( 'Property ID', 'essential-real-estate' ); ?></p>
                    </div>
                </div>
				<?php if ( ! empty( $property_size ) ): ?>
                    <div class="property-area">
                        <span class="fa fa-arrows"></span>
                        <div class="content-property-info">
                            <p class="property-info-value"><?php
								echo ere_get_format_number( $property_size ); ?>
                                <span><?php
									$measurement_units = ere_get_measurement_units();
									echo wp_kses_post($measurement_units); ?></span>
                            </p>
                            <p class="property-info-title"><?php esc_html_e( 'Size', 'essential-real-estate' ); ?></p>
                        </div>
                    </div>
				<?php endif; ?>
				<?php if ( ! empty( $property_bedrooms ) ): ?>
                    <div class="property-bedrooms">
                        <span class="fa fa-hotel"></span>
                        <div class="content-property-info">
                            <p class="property-info-value"><?php echo esc_html( $property_bedrooms ) ?></p>
                            <p class="property-info-title"><?php
								echo ere_get_number_text($property_bedrooms, esc_html__( 'Bedrooms', 'essential-real-estate' ), esc_html__( 'Bedroom', 'essential-real-estate' ));
								?></p>
                        </div>
                    </div>
				<?php endif; ?>
				<?php if ( ! empty( $property_bathrooms ) ): ?>
                    <div class="property-bathrooms">
                        <span class="fa fa-bath"></span>
                        <div class="content-property-info">
                            <p class="property-info-value"><?php echo esc_html( $property_bathrooms ) ?></p>
                            <p class="property-info-title"><?php
								echo ere_get_number_text($property_bathrooms, esc_html__( 'Bathrooms', 'essential-real-estate' ), esc_html__( 'Bathroom', 'essential-real-estate' ));
								?></p>
                        </div>
                    </div>
				<?php endif; ?>
            </div>

        </div>
    </div>

    <?php if (isset($content) && !empty($content)): ?>
    <div id="p-description"  class="s-sec">
        <div class="s-container">
            <div class="single-property-element property-description">
                <div class="s-title">
                    <h2><?php esc_html_e( 'Description', 'essential-real-estate' ); ?></h2>
                </div>
                <div class="ere-property-element">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div id="p-details"  class="s-sec">
    <div class="s-container">
        <div class="s-title">
            <h2><?php esc_html_e( 'Details', 'essential-real-estate' ); ?></h2>
        </div>
    <div class="single-property-element property-info-tabs property-tab">
        <div class="ere-property-element">
            <ul id="ere-features-tabs" class="nav nav-tabs">
                <li class="active"><a data-toggle="tab"
                                      href="#ere-overview"><?php esc_html_e('Overview', 'essential-real-estate'); ?></a>
                </li>
				<?php if ($property_features): ?>
                    <li><a data-toggle="tab"
                           href="#ere-features"><?php esc_html_e('Features', 'essential-real-estate'); ?></a></li>
				<?php endif; ?>
				<?php if (!empty($property_video)) : ?>
                    <li><a data-toggle="tab" href="#ere-video"><?php esc_html_e('Video', 'essential-real-estate'); ?></a>
                    </li>
				<?php endif; ?>
				<?php
				if ((!empty($property_image_360) || !empty($property_virtual_tour)) && ($property_virtual_tour_type == '0' || $property_virtual_tour_type == '1')): ?>
                    <li><a data-toggle="tab"
                           href="#ere-virtual_tour_360"><?php esc_html_e('Virtual Tour', 'essential-real-estate'); ?></a>
                    </li>
				<?php endif; ?>
            </ul>
            <div class="tab-content">
                <div id="ere-overview" class="tab-pane fade in active">
                    <ul class="list-2-col ere-property-list">
                        <li>
                            <strong><?php esc_html_e('Property ID', 'essential-real-estate'); ?></strong>
                            <span><?php
								if (!empty($property_identity)) {
									echo esc_html($property_identity);
								} else {
									echo esc_html($property_id);
								}
								?></span>
                        </li>
						<?php if (!empty($price)): ?>
                            <li>
                                <strong><?php esc_html_e('Price', 'essential-real-estate'); ?></strong>
                                <span class="ere-property-price">
                                    <?php if (!empty($price_prefix)) {
	                                    echo '<span class="property-price-prefix">' . $price_prefix . ' </span>';
                                    } ?>
                                    <?php echo ere_get_format_money($price_short, $price_unit) ?>
                                    <?php if (!empty($price_postfix)) {
	                                    echo '<span class="property-price-postfix"> / ' . $price_postfix . '</span>';
                                    } ?>
                                </span>
                            </li>
						<?php elseif (ere_get_option('empty_price_text', '') != ''): ?>
                            <li>
                                <strong><?php esc_html_e('Price', 'essential-real-estate'); ?></strong>
                                <span><?php echo ere_get_option('empty_price_text', '') ?></span>
                            </li>
						<?php endif; ?>
						<?php if (count($property_type_arr) > 0): ?>
                            <li>
                                <strong><?php esc_html_e('Property Type', 'essential-real-estate'); ?></strong>
                                <span><?php echo join(', ', $property_type_arr) ?></span>
                            </li>
						<?php endif; ?>
						<?php if (count($property_status_arr) > 0): ?>
                            <li>
                                <strong><?php esc_html_e('Property status', 'essential-real-estate'); ?></strong>
                                <span><?php echo join(', ', $property_status_arr) ?></span>
                            </li>
						<?php endif; ?>
						<?php if (!empty($property_rooms)): ?>
                            <li>
                                <strong><?php esc_html_e('Rooms', 'essential-real-estate'); ?></strong>
                                <span><?php echo esc_html($property_rooms) ?></span>
                            </li>
						<?php endif; ?>
						<?php if (!empty($property_bedrooms)): ?>
                            <li>
                                <strong><?php esc_html_e('Bedrooms', 'essential-real-estate'); ?></strong>
                                <span><?php echo esc_html($property_bedrooms) ?></span>
                            </li>
						<?php endif; ?>
						<?php if (!empty($property_bathrooms)): ?>
                            <li>
                                <strong><?php esc_html_e('Bathrooms', 'essential-real-estate'); ?></strong>
                                <span><?php echo esc_html($property_bathrooms) ?></span>
                            </li>
						<?php endif; ?>
						<?php if (!empty($property_year)): ?>
                            <li>
                                <strong><?php esc_html_e('Year Built', 'essential-real-estate'); ?></strong>
                                <span><?php echo esc_html($property_year) ?></span>
                            </li>
						<?php endif; ?>
						<?php if (!empty($property_size)): ?>
                            <li>
                                <strong><?php esc_html_e('Size', 'essential-real-estate'); ?></strong>

                                <span><?php echo wp_kses_post(sprintf('%s %s', ere_get_format_number($property_size), $measurement_units)); ?></span>
                            </li>
						<?php endif; ?>
						<?php if (!empty($property_land)): ?>
                            <li>
                                <strong><?php esc_html_e('Land area', 'essential-real-estate'); ?></strong>
                                <span><?php $measurement_units = ere_get_measurement_units();
									echo wp_kses_post(sprintf('%s Rai %s Ngan %s %s', $property_land_thaiunit[0],$property_land_thaiunit[1],$property_land_thaiunit[2], $measurement_units_land_area)); ?></span>
                            </li>
						<?php endif; ?>

						<?php if (count($property_label_arr) > 0): ?>
                            <li>
                                <strong><?php esc_html_e('Label', 'essential-real-estate'); ?></strong>
								<?php if ($property_label_arr): ?>
                                    <span><?php echo join(', ', $property_label_arr) ?></span><?php endif; ?>
                            </li>
						<?php endif; ?>

						<?php if (!empty($property_garage)): ?>
                            <li>
                                <strong><?php esc_html_e('Garages', 'essential-real-estate'); ?></strong>
                                <span><?php echo esc_html($property_garage) ?></span>
                            </li>
						<?php endif; ?>
						<?php if (!empty($property_garage_size)): ?>
                            <li>
                                <strong><?php esc_html_e('Garage Size', 'essential-real-estate'); ?></strong>
                                <span><?php echo wp_kses_post(sprintf('%s %s', $property_garage_size, $measurement_units)); ?></span>
                            </li>
						<?php endif; ?>
						<?php
						if (count($additional_fields) > 0):
							foreach ($additional_fields as $key => $field):
								$property_field = get_post_meta($property_id, $field['id'], true);
								if (!empty($property_field)):?>
                                    <li>
                                        <strong><?php echo esc_html($field['title']); ?></strong>
                                        <span><?php
											if ($field['type'] == 'checkbox_list') {
												$text = '';
												if (count($property_field) > 0) {
													foreach ($property_field as $value => $v) {
														$text .= $v . ', ';
													}
												}
												$text = rtrim($text, ', ');
												echo esc_html($text);
											} else {
												echo esc_html($property_field);
											}
											?></span>
                                    </li>
								<?php
								endif;
							endforeach;
						endif; ?>

						<?php for ($i = 0; $i < $additional_features; $i++) { ?>
							<?php if (!empty($additional_feature_title[$i]) && !empty($additional_feature_value[$i])): ?>
                                <li>
                                    <strong><?php echo esc_html($additional_feature_title[$i]); ?></strong>
                                    <span><?php echo esc_html($additional_feature_value[$i]) ?></span>
                                </li>
							<?php endif; ?>
						<?php } ?>
                    </ul>
                </div>
				<?php if ($property_features): ?>
                    <div id="ere-features" class="tab-pane fade">
						<?php
						$features_terms_id = array();
						if (!is_wp_error($property_features)) {
							foreach ($property_features as $feature) {
								$features_terms_id[] = intval($feature->term_id);
							}
						}
						$all_features = get_categories(array(
							'taxonomy' => 'property-feature',
							'hide_empty' => 0,
							'orderby' => 'term_id',
							'order' => 'ASC'
						));
						$parents_items = $child_items = array();
						if ($all_features) {
							foreach ($all_features as $term) {
								if (0 == $term->parent) $parents_items[] = $term;
								if ($term->parent) $child_items[] = $term;
							};
							$property_archive_link = get_post_type_archive_link('property');

							if (is_taxonomy_hierarchical('property-feature') && count($child_items) > 0) {
								foreach ($parents_items as $parents_item) {
									echo '<h4>' . $parents_item->name . '</h4>';
									echo '<div class="row mg-bottom-30">';
									foreach ($child_items as $child_item) {
										if ($child_item->parent == $parents_item->term_id) {
											$term_link = get_term_link($child_item, 'property-feature');

											if (in_array($child_item->term_id, $features_terms_id)) {
												echo '<div class="col-md-3 col-xs-6 col-mb-12 property-feature-wrap"><a href="' . esc_url($term_link) . '" class="feature-checked"><i class="fa fa-check-square-o"></i> ' . $child_item->name . '</a></div>';
											} else {
												$hide_empty_features = ere_get_option('hide_empty_features', 1);
												if ($hide_empty_features != 1) {
													echo '<div class="col-md-3 col-xs-6 col-mb-12 property-feature-wrap"><a href="' . esc_url($term_link) . '" class="feature-unchecked"><i class="fa fa-square-o"></i> ' . $child_item->name . '</a></div>';
												}
											}
										};
									};
									echo '</div>';
								};
							} else {
								echo '<div class="row">';
								foreach ($parents_items as $parents_item) {
									$term_link = get_term_link($parents_item, 'property-feature');

									if (in_array($parents_item->term_id, $features_terms_id)) {
										echo '<div class="col-md-3 col-xs-6 col-mb-12 property-feature-wrap"><a href="' . esc_url($term_link) . '" class="feature-checked"><i class="fa fa-check-square-o"></i> ' . $parents_item->name . '</a></div>';
									} else {
										$hide_empty_features = ere_get_option('hide_empty_features', 1);
										if ($hide_empty_features != 1) {
											echo '<div class="col-md-3 col-xs-6 col-mb-12 property-feature-wrap"><a href="' . esc_url($term_link) . '" class="feature-unchecked"><i class="fa fa-square-o"></i> ' . $parents_item->name . '</a></div>';
										}
									}
								};
								echo '</div>';
							};
						};
						?>
                    </div>
				<?php endif; ?>
				<?php if (!empty($property_video)) : ?>
                    <div id="ere-video" class="tab-pane fade">
                        <div class="video<?php if (!empty($property_video_image)): ?> video-has-thumb<?php endif; ?>">
                            <div class="entry-thumb-wrap">
								<?php if (wp_oembed_get($property_video)) : ?>
									<?php
									$image_src = ere_image_resize_id($property_video_image, 870, 420, true);
									$width = '870';
									$height = '420';
									if (!empty($image_src)):?>
                                        <div class="entry-thumbnail property-video ere-light-gallery">
                                            <img class="img-responsive" src="<?php echo esc_url($image_src); ?>"
                                                 width="<?php echo esc_attr($width) ?>"
                                                 height="<?php echo esc_attr($height) ?>"
                                                 alt="<?php the_title_attribute(); ?>"/>
                                            <a class="ere-view-video"
                                               data-src="<?php echo esc_url($property_video); ?>"><i
                                                        class="fa fa-play-circle-o"></i></a>
                                        </div>
									<?php else: ?>
                                        <div class="embed-responsive embed-responsive-16by9 embed-responsive-full">
											<?php echo wp_oembed_get($property_video, array('wmode' => 'transparent')); ?>
                                        </div>
									<?php endif; ?>
								<?php else : ?>
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-full">
										<?php echo wp_kses_post($property_video); ?>
                                    </div>
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
				<?php endif; ?>
				<?php
				if (!empty($property_image_360) && $property_virtual_tour_type == '0') :?>
                    <div id="ere-virtual_tour_360" class="tab-pane fade">
                        <iframe width="100%" height="600" scrolling="no" allowfullscreen
                                src="<?php echo ERE_PLUGIN_URL . "public/assets/packages/vr-view/index.html?image=" . esc_url($property_image_360); ?>"></iframe>
                    </div>
				<?php elseif (!empty($property_virtual_tour) && $property_virtual_tour_type == '1'): ?>
                    <div id="ere-virtual_tour_360" class="tab-pane fade">
						<?php echo(!empty($property_virtual_tour) ? do_shortcode($property_virtual_tour) : '') ?>
                    </div>
				<?php endif; ?>
            </div>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $('#ere-features-tabs').tabCollapse();
            });
        </script>
        </div>
    </div>




    </div>

    <?php if (isset($property_floors) && is_array($property_floors) && count($property_floors) > 0):
    wp_enqueue_script('bootstrap-tabcollapse'); ?>
    <div class="single-property-element property-floors-tab property-tab">
		<?php $index = 0; ?>
        <div class="ere-property-element">
            <ul id="ere-floors-tabs" class="nav nav-tabs">
				<?php foreach ($property_floors as $floor): ?>
                    <li <?php if ($index === 0): ?>class="active"<?php endif; ?>><a data-toggle="tab"
                                                                                    href="#ere-floor-<?php echo esc_attr($index); ?>">
							<?php echo !empty($floor[ERE_METABOX_PREFIX . 'floor_name']) ? sanitize_text_field($floor[ERE_METABOX_PREFIX . 'floor_name']) : (esc_html__('Floor', 'essential-real-estate') . ' ' . ($index + 1)) ?></a>
                    </li>
					<?php $index++; ?>
				<?php endforeach; ?>
            </ul>
            <div class="tab-content">
				<?php $index = 0; ?>
				<?php foreach ($property_floors as $floor):
					$image_id = $floor[ERE_METABOX_PREFIX . 'floor_image']['id'];
					$image_src = '';
					$get_image_src = wp_get_attachment_image_src($image_id, 'full');
					if (is_array($get_image_src) && count($get_image_src) > 0) {
						$image_src = $get_image_src[0];
					}
					$floor_size = $floor[ERE_METABOX_PREFIX . 'floor_size'];
					$floor_size_postfix = $floor[ERE_METABOX_PREFIX . 'floor_size_postfix'];
					$floor_bathrooms = $floor[ERE_METABOX_PREFIX . 'floor_bathrooms'];
					$floor_price = $floor[ERE_METABOX_PREFIX . 'floor_price'];
					$floor_price_postfix = $floor[ERE_METABOX_PREFIX . 'floor_price_postfix'];
					$floor_bedrooms = $floor[ERE_METABOX_PREFIX . 'floor_bedrooms'];
					$floor_description = $floor[ERE_METABOX_PREFIX . 'floor_description'];
					$gallery_id = 'ere_floor-' . rand();
					?>
                    <div id="ere-floor-<?php echo esc_attr($index) ?>"
                         class="tab-pane fade<?php if ($index === 0): ?> in active<?php endif; ?>">
						<?php if (!empty($image_src)): ?>
                            <div class="floor-image ere-light-gallery mg-bottom-20">
                                <img src="<?php echo esc_url($image_src); ?>" alt="<?php the_title_attribute(); ?>">
                                <a data-thumb-src="<?php echo esc_url($image_src); ?>"
                                   data-gallery-id="<?php echo esc_attr($gallery_id); ?>"
                                   data-rel="ere_light_gallery" href="<?php echo esc_url($image_src); ?>"
                                   class="zoomGallery"><i
                                            class="fa fa-expand"></i></a>
                            </div>
						<?php endif; ?>
						<?php if (isset($floor_description) && !empty($floor_description)): ?>
                            <div class="floor-description">
                                <p><?php echo sanitize_text_field($floor_description); ?></p>
                            </div>
						<?php endif; ?>
                        <ul class="list-2-col ere-property-list">
							<?php if (isset($floor_size) && !empty($floor_size)): ?>
                                <li>
                                    <strong><?php esc_html_e('Size', 'essential-real-estate'); ?></strong>
                                    <span><?php echo sanitize_text_field($floor_size); ?>
										<?php echo (isset($floor_size_postfix) && !empty($floor_size_postfix)) ? sanitize_text_field($floor_size_postfix) : '' ?>
								</span>
                                </li>
							<?php endif; ?>
							<?php if (isset($floor_bedrooms) && !empty($floor_bedrooms)): ?>
                                <li>
                                    <strong><?php esc_html_e('Bedrooms', 'essential-real-estate'); ?></strong>
                                    <span><?php echo sanitize_text_field($floor_bedrooms); ?></span>
                                </li>
							<?php endif; ?>
							<?php if (isset($floor_bathrooms) && !empty($floor_bathrooms)): ?>
                                <li>
                                    <strong><?php esc_html_e('Bathrooms', 'essential-real-estate'); ?></strong>
                                    <span><?php echo sanitize_text_field($floor_bathrooms); ?></span>
                                </li>
							<?php endif; ?>

							<?php if (isset($floor_price) && !empty($floor_price)): ?>
                                <li>
                                    <strong><?php esc_html_e('Price', 'essential-real-estate'); ?></strong>
                                    <span><?php echo ere_get_format_money($floor_price); ?><?php echo (isset($floor_price_postfix) && !empty($floor_price_postfix)) ? ' / ' . sanitize_text_field($floor_price_postfix) : '' ?></span>
                                </li>
							<?php endif; ?>

                        </ul>
                    </div>
					<?php $index++; ?>
				<?php endforeach; ?>
            </div>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $('#ere-floors-tabs').tabCollapse();
            });
        </script>
    </div>
    <?php endif; ?>

    <?php if ($property_gallery):
    $property_gallery = explode('|', $property_gallery); ?>
    <div id="#gallery" class="s-sec">
        <div class="s-container">
            <div class="s-title">
                <h2><?php esc_html_e('Gallery', 'zommzeed'); ?></h2>
            </div>
            <div class="single-property-element property-gallery-wrap">
                <div class="ere-property-element">
                    <div class="single-property-image-main owl-carousel manual ere-carousel-manual">
                        <?php
                        $gallery_id = 'ere_gallery-' . rand();
                        foreach ($property_gallery as $image):
                            $image_src = ere_image_resize_id($image, 870, 420, true);
                            $image_full_src = wp_get_attachment_image_src($image, 'full');
                            if (!empty($image_src)) {
                                ?>
                                <div class="property-gallery-item ere-light-gallery">
                                    <img src="<?php echo esc_url($image_src) ?>" alt="<?php the_title(); ?>"
                                         title="<?php the_title(); ?>">
                                    <a data-thumb-src="<?php echo esc_url($image_full_src[0]); ?>"
                                       data-gallery-id="<?php echo esc_attr($gallery_id); ?>"
                                       data-rel="ere_light_gallery" href="<?php echo esc_url($image_full_src[0]); ?>"
                                       class="zoomGallery"><i
                                                class="fa fa-expand"></i></a>
                                </div>
                            <?php } ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="single-property-image-thumb owl-carousel manual ere-carousel-manual">
                        <?php
                        foreach ($property_gallery as $image):
                            $image_src = ere_image_resize_id($image, 250, 130, true);
                            if (!empty($image_src)) { ?>
                                <div class="property-gallery-item">
                                    <img src="<?php echo esc_url($image_src) ?>" alt="<?php the_title(); ?>"
                                         title="<?php the_title(); ?>">
                                </div>
                            <?php } ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div id="p-location" class="s-grid -m2 -d2">
        <div class="single-property-element property-google-map-directions ere-google-map-directions">
            <div class="ere-property-element">
                <div id="<?php echo esc_attr($map_id) ?>" class="ere-google-map-direction">
                </div>
            </div>

        </div>
        <div class="single-property-element property-location dark">
            <div class="s-title">
                <h2><?php esc_html_e('Address', 'essential-real-estate'); ?></h2>
            </div>
            <div class="ere-property-element">
                <?php if (!empty($property_address)): ?>
                    <div class="property-address">
                        <strong><?php esc_html_e('Address:', 'essential-real-estate'); ?></strong>
                        <span><?php echo esc_html($property_address) ?></span>
                    </div>
                <?php endif; ?>
                <ul class="list-2-col">


                    <?php if (count($property_neighborhood_arr) > 0): ?>
                        <li>
                            <strong><?php esc_html_e('Tumbon / District:', 'essential-real-estate'); ?></strong>
                            <span><?php echo join(', ', $property_neighborhood_arr); ?></span>
                        </li>
                    <?php endif;
                    if (count($property_city_arr) > 0): ?>
                    <li>
                        <strong><?php esc_html_e('Amphor / City:', 'essential-real-estate'); ?></strong>
                        <span><?php echo join(', ', $property_city_arr); ?></span>
                    </li>
	                <?php endif;
                    if (count($property_state_arr) > 0): ?>
                    <li>
                        <strong><?php esc_html_e('Province / State:', 'essential-real-estate'); ?></strong>
                        <span><?php echo join(', ', $property_state_arr); ?></span>
                    </li>
	                <?php endif;
                    if (!empty($property_zip)): ?>
                        <li>
                            <strong><?php esc_html_e('Postal code / ZIP:', 'essential-real-estate'); ?></strong>
                            <span><?php echo esc_html($property_zip) ?></span>
                        </li>
                    <?php endif; ?>
	                <?php if (!empty($property_country)):
	                $property_country = ere_get_country_by_code($property_country); ?>
                    <li>
                        <strong><?php esc_html_e('Country:', 'essential-real-estate'); ?></strong>
                        <span><?php echo esc_html($property_country); ?></span>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <?php if ( $agent_display_option != 'no'): ?>
    <div id="contact-us" class="s-sec">
        <div class="s-container">
        <div class="single-property-element property-contact-agent">
            <div class="s-title">
                <h2><?php esc_html_e( 'Contact', 'essential-real-estate' ); ?></h2>
            </div>
            <div class="ere-property-element">
            <?php
            $property_agent       = isset($property_meta_data[ ERE_METABOX_PREFIX . 'property_agent' ]) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_agent' ][0] : '';
            $agent_type = '';$user_id=0;
            if ( $agent_display_option == 'author_info' || ( $agent_display_option == 'other_info') || ( $agent_display_option == 'agent_info' && ! empty( $property_agent ) ) ): ?>
                <div class="agent-info row">
                    <?php
                    $email = $avatar_src = $agent_link = $agent_name = $agent_position = $agent_facebook_url = $agent_twitter_url =
                    $agent_linkedin_url = $agent_pinterest_url = $agent_skype =
                    $agent_youtube_url = $agent_vimeo_url = $agent_mobile_number = $agent_office_address = $agent_website_url = $agent_description = '';
                    if ( $agent_display_option != 'other_info' ) {
                        $width = 270; $height = 340;
                        $no_avatar_src= ERE_PLUGIN_URL . 'public/assets/images/profile-avatar.png';
                        $default_avatar=ere_get_option('default_user_avatar','');
                        if($default_avatar!='')
                        {
                            if(is_array($default_avatar)&& $default_avatar['url']!='')
                            {
                                $resize = ere_image_resize_url($default_avatar['url'], $width, $height, true);
                                if ($resize != null && is_array($resize)) {
                                    $no_avatar_src = $resize['url'];
                                }
                            }
                        }

                        $property_agent_status = get_post_status($property_agent);
                        if ($property_agent_status !== 'publish') {
                            $agent_display_option = 'author_info';
                        }

                        if( $agent_display_option == 'author_info') {
                            global $post;
                            $user_id = $post->post_author;
                            $email = get_userdata( $user_id )->user_email;
                            $user_info      = get_userdata( $user_id );
                            // Show Property Author Info (Get info via User. Apply for User, Agent, Seller)
                            $author_picture_id = get_the_author_meta( ERE_METABOX_PREFIX . 'author_picture_id', $user_id );
                            $avatar_src = ere_image_resize_id($author_picture_id, $width, $height, true);


                            if(empty($user_info->first_name) && empty($user_info->last_name))
                            {
                                $agent_name=$user_info->user_login;
                            }
                            else
                            {
                                $agent_name     = $user_info->first_name . ' ' . $user_info->last_name;
                            }
                            $agent_facebook_url   = get_the_author_meta( ERE_METABOX_PREFIX . 'author_facebook_url', $user_id );
                            $agent_twitter_url    = get_the_author_meta( ERE_METABOX_PREFIX . 'author_twitter_url', $user_id );
                            $agent_linkedin_url   = get_the_author_meta( ERE_METABOX_PREFIX . 'author_linkedin_url', $user_id );
                            $agent_pinterest_url  = get_the_author_meta( ERE_METABOX_PREFIX . 'author_pinterest_url', $user_id );
                            $agent_instagram_url  = get_the_author_meta( ERE_METABOX_PREFIX . 'author_instagram_url', $user_id );
                            $agent_skype          = get_the_author_meta( ERE_METABOX_PREFIX . 'author_skype', $user_id );
                            $agent_youtube_url    = get_the_author_meta( ERE_METABOX_PREFIX . 'author_youtube_url', $user_id );
                            $agent_vimeo_url      = get_the_author_meta( ERE_METABOX_PREFIX . 'author_vimeo_url', $user_id );

                            $agent_mobile_number  = get_the_author_meta( ERE_METABOX_PREFIX . 'author_mobile_number', $user_id );
                            $agent_office_address = get_the_author_meta( ERE_METABOX_PREFIX . 'author_office_address', $user_id );
                            $agent_website_url    = get_the_author_meta( 'user_url', $user_id );

                            $author_agent_id = get_the_author_meta(ERE_METABOX_PREFIX . 'author_agent_id', $user_id);
                            $agent_status = get_post_status($author_agent_id);
                            if ($agent_status == 'publish') {
                                $agent_position = esc_html__( 'Property Agent', 'essential-real-estate' );
                                $agent_type = esc_html__( 'Agent', 'essential-real-estate' );
                                $agent_link = get_the_permalink($author_agent_id);
                            } else {
                                $agent_position = esc_html__( 'Property Seller', 'essential-real-estate' );
                                $agent_type = esc_html__( 'Seller', 'essential-real-estate' );
                                $agent_link = get_author_posts_url($user_id);
                            }
                        } else {
                            $agent_post_meta_data = get_post_custom( $property_agent);
                            $email = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_email']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_email'][0] : '';
                            $agent_name     = get_the_title($property_agent);
                            $avatar_id = get_post_thumbnail_id($property_agent);
                            $avatar_src = ere_image_resize_id($avatar_id, $width, $height, true);

                            $agent_facebook_url = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_facebook_url']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_facebook_url'][0] : '';
                            $agent_twitter_url = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_twitter_url']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_twitter_url'][0] : '';
                            $agent_linkedin_url = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_linkedin_url']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_linkedin_url'][0] : '';
                            $agent_pinterest_url = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_pinterest_url']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_pinterest_url'][0] : '';
                            $agent_instagram_url = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_instagram_url']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_instagram_url'][0] : '';
                            $agent_skype = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_skype']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_skype'][0] : '';
                            $agent_youtube_url = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_youtube_url']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_youtube_url'][0] : '';
                            $agent_vimeo_url = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_vimeo_url']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_vimeo_url'][0] : '';

                            $agent_mobile_number = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_mobile_number']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_mobile_number'][0] : '';
                            $agent_office_address = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_office_address']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_office_address'][0] : '';
                            $agent_website_url = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_website_url']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_website_url'][0] : '';

                            $agent_position = esc_html__( 'Property Agent', 'essential-real-estate' );
                            $agent_type = esc_html__( 'Agent', 'essential-real-estate' );
                            $agent_link     = get_the_permalink( $property_agent );
                        }
                    } elseif ( $agent_display_option == 'other_info' ) {
                        $email = isset($property_meta_data[ ERE_METABOX_PREFIX . 'property_other_contact_mail' ]) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_other_contact_mail' ][0] : '';
                        $agent_name = isset($property_meta_data[ ERE_METABOX_PREFIX . 'property_other_contact_name' ]) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_other_contact_name' ][0] : '';
                        $agent_mobile_number = isset($property_meta_data[ ERE_METABOX_PREFIX . 'property_other_contact_phone' ]) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_other_contact_phone' ][0] : '';
                        $agent_description = isset($property_meta_data[ ERE_METABOX_PREFIX . 'property_other_contact_description' ]) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_other_contact_description' ][0] : '';
                    }
                    ?>
                    <?php if ( $agent_display_option != 'other_info' ):?>
                    <div class="agent-content  col-md-6 col-sm-12">
                        <div class="agent-heading">
                            <?php if ( ! empty( $agent_name ) ): ?>
                                <h4><?php if ( ! empty( $agent_link ) ): ?><a title="<?php echo esc_attr( $agent_name ) ?>" href="<?php echo esc_url( $agent_link ) ?>"><?php endif; ?><?php echo esc_attr( $agent_name ) ?><?php if ( ! empty( $agent_link ) ): ?></a><?php endif; ?></h4>
                            <?php endif; ?>
                            <?php if ( ! empty( $agent_position ) ): ?>
                                <span><?php echo esc_html( $agent_position ) ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="agent-info-contact">
                            <?php if ( ! empty( $agent_office_address ) ): ?>
                                <div class="agent-address">
                                    <i class="fa fa-map-marker"></i>
                                    <span><?php echo esc_html( $agent_office_address ); ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if ( ! empty( $agent_mobile_number ) ): ?>
                                <div class="agent-mobile">
                                    <i class="fa fa-phone"></i>
                                    <span><?php echo esc_html( $agent_mobile_number ); ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if ( ! empty( $email ) ): ?>
                                <div class="agent-email">
                                    <i class="fa fa-envelope"></i>
                                    <span><?php echo esc_html( $email ); ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if ( ! empty( $agent_website_url ) ): ?>
                                <div class="agent-website">
                                    <i class="fa fa-link"></i>
                                    <a href="<?php echo esc_url( $agent_website_url ); ?>"><?php echo esc_html( $agent_website_url ); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="agent-social">
		                    <?php if ( ! empty( $agent_facebook_url ) ): ?>
                                <a title="Facebook" href="<?php echo esc_url( $agent_facebook_url ); ?>">
                                    <i class="fa fa-facebook"></i>
                                </a>
		                    <?php endif; ?>
		                    <?php if ( ! empty( $agent_twitter_url ) ): ?>
                                <a title="Twitter" href="<?php echo esc_url( $agent_twitter_url ); ?>">
                                    <i class="fa fa-twitter"></i>
                                </a>
		                    <?php endif; ?>
		                    <?php if ( ! empty( $agent_skype ) ): ?>
                                <a title="Skype" href="skype:<?php echo esc_attr( $agent_skype ); ?>?chat">
                                    <i class="fa fa-skype"></i>
                                </a>
		                    <?php endif; ?>
		                    <?php if ( ! empty( $agent_linkedin_url ) ): ?>
                                <a title="Linkedin" href="<?php echo esc_url( $agent_linkedin_url ); ?>">
                                    <i class="fa fa-linkedin"></i>
                                </a>
		                    <?php endif; ?>
		                    <?php if ( ! empty( $agent_pinterest_url ) ): ?>
                                <a title="Pinterest" href="<?php echo esc_url( $agent_pinterest_url ); ?>">
                                    <i class="fa fa-pinterest"></i>
                                </a>
		                    <?php endif; ?>
		                    <?php if ( ! empty( $agent_instagram_url ) ): ?>
                                <a title="Instagram" href="<?php echo esc_url( $agent_instagram_url ); ?>">
                                    <i class="fa fa-instagram"></i>
                                </a>
		                    <?php endif; ?>
		                    <?php if ( ! empty( $agent_youtube_url ) ): ?>
                                <a title="Youtube" href="<?php echo esc_url( $agent_youtube_url ); ?>">
                                    <i class="fa fa-youtube-play"></i>
                                </a>
		                    <?php endif; ?>
		                    <?php if ( ! empty( $agent_vimeo_url ) ): ?>
                                <a title="Vimeo" href="<?php echo esc_url( $agent_vimeo_url ); ?>">
                                    <i class="fa fa-vimeo"></i>
                                </a>
		                    <?php endif; ?>
                        </div>
                        <?php if(!empty( $agent_description )): ?>
                            <div class="description">
                                <p><?php echo wp_kses_post( $agent_description ); ?></p>
                            </div>
                        <?php endif; ?>
                        <?php if ( ! empty( $property_agent ) ): ?>
                            <a class="btn btn-primary" href="<?php echo get_post_type_archive_link( 'property' ); ?>?agent_id=<?php echo esc_attr($property_agent) ?>" title="<?php echo esc_attr( $agent_name ) ?>"><?php esc_html_e( 'Other Properties', 'essential-real-estate' ); ?></a>
                        <?php else:?>
                            <a class="btn btn-primary" href="<?php echo get_post_type_archive_link( 'property' ); ?>?user_id=<?php echo esc_attr($user_id) ?>" title="<?php echo esc_attr( $agent_name ) ?>"><?php esc_html_e( 'Other Properties', 'essential-real-estate' ); ?></a>
                        <?php endif; ?>
                    </div>

                    <?php else:?>
                        <div class="agent-content col-md-12 col-sm-12 col-xs-12">
                            <div class="agent-heading">
                                <?php if ( ! empty( $agent_name ) ): ?>
                                    <h4><span><?php esc_html_e('Name: ','essential-real-estate') ?></span><?php echo esc_attr( $agent_name ) ?></h4>
                                <?php endif; ?>
                            </div>
                            <div class="agent-info-contact">
                                <?php if ( ! empty( $agent_mobile_number ) ): ?>
                                    <div class="agent-mobile">
                                        <i class="fa fa-phone"></i>
                                        <span><?php echo esc_html( $agent_mobile_number ); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if ( ! empty( $email ) ): ?>
                                    <div class="agent-email">
                                        <i class="fa fa-envelope"></i>
                                        <span><?php echo esc_html( $email ); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php if(!empty( $agent_description )): ?>
                                <div class="description">
                                    <p><?php echo wp_kses_post( $agent_description ); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif;?>

	                <?php if ( ! empty( $email ) ): ?>
                        <div class="contact-agent col-md-6 col-sm-12">
                            <form action="#" method="POST" id="contact-agent-form" class="row">
                                <input type="hidden" name="target_email" value="<?php echo esc_attr( $email ); ?>">
                                <input type="hidden" name="property_url" value="<?php echo get_permalink(); ?>">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control" name="sender_name" type="text"
                                               placeholder="<?php esc_attr_e( 'Full Name', 'essential-real-estate' ); ?> *">
                                        <div
                                                class="hidden name-error form-error"><?php esc_html_e( 'Please enter your Name!', 'essential-real-estate' ); ?></div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control" name="sender_phone" type="text"
                                               placeholder="<?php esc_attr_e( 'Phone Number', 'essential-real-estate' ); ?> *">
                                        <div
                                                class="hidden phone-error form-error"><?php esc_html_e( 'Please enter your Phone!', 'essential-real-estate' ); ?></div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control" name="sender_email" type="email"
                                               placeholder="<?php esc_attr_e( 'Email Address', 'essential-real-estate' ); ?> *">
                                        <div class="hidden email-error form-error"
                                             data-not-valid="<?php esc_attr_e( 'Your Email address is not Valid!', 'essential-real-estate' ) ?>"
                                             data-error="<?php esc_attr_e( 'Please enter your Email!', 'essential-real-estate' ) ?>"><?php esc_html_e( 'Please enter your Email!', 'essential-real-estate' ); ?></div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <textarea class="form-control" name="sender_msg" rows="4"
                                              placeholder="<?php esc_attr_e( 'Message', 'essential-real-estate' ); ?> *"><?php $title=get_the_title(); echo sprintf(esc_html__( 'Hello, I am interested in [%s]', 'essential-real-estate' ), esc_html($title)) ?></textarea>
                                        <div
                                                class="hidden message-error form-error"><?php esc_html_e( 'Please enter your Message!', 'essential-real-estate' ); ?></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
					                <?php if (ere_enable_captcha('contact_agent')) {do_action('ere_generate_form_recaptcha');} ?>
                                </div>
                                <div class="col-sm-6 text-right">
					                <?php wp_nonce_field('ere_contact_agent_ajax_nonce', 'ere_security_contact_agent'); ?>
                                    <input type="hidden" name="action" id="contact_agent_with_property_url_action" value="ere_contact_agent_ajax">
                                    <button type="submit"
                                            class="agent-contact-btn btn"><?php esc_html_e( 'Submit Request', 'essential-real-estate' ); ?></button>
                                    <div class="form-messages"></div>
                                </div>
                            </form>
                        </div>
	                <?php endif; ?>
                </div>

            <?php endif; ?>
            </div>
        </div>
        </div>
    </div>
<?php endif;?>

    <div class="property-action s-sec">
        <div class="s-container">
        <div class="row">
			<?php if (ere_get_option('enable_social_share', '1') == '1') : ?>
<?php
/**
 * Created by G5Theme.
 * User: trungpq
 * Date: 30/12/2016
 * Time: 8:04 SA
 */
$social_sharing    = ere_get_option( 'social_sharing', array() );
$sharing_facebook = $sharing_twitter = $sharing_google = $sharing_linkedin = $sharing_tumblr = $sharing_pinterest = $sharing_whatsup = '';
if(is_array( $social_sharing ) && count( $social_sharing ) > 0) {
    $sharing_facebook  = in_array( 'facebook', $social_sharing );
    $sharing_twitter   = in_array( 'twitter', $social_sharing );
    $sharing_google    = in_array( 'google', $social_sharing );
    $sharing_linkedin  = in_array( 'linkedin', $social_sharing );
    $sharing_tumblr    = in_array( 'tumblr', $social_sharing );
    $sharing_pinterest = in_array( 'pinterest', $social_sharing );
    $sharing_whatsup = in_array( 'whatsup', $social_sharing );
}
if ( ! $sharing_facebook && ! $sharing_twitter && ! $sharing_google && ! $sharing_linkedin && ! $sharing_tumblr && ! $sharing_pinterest && !$sharing_whatsup ) {
    return;
}
?>
            <div class="social-share col-md-6 col-sm-12 text-center">
                <div class="social-share-hover">
                    Share this property
                    <div class="social-share-list">
                        <div class="list-social-icon clearfix">
                            <?php if ( $sharing_facebook == 1 ) :?>
                                <a  target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink())?>">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            <?php endif; ?>

                            <?php if ( $sharing_twitter == 1 ) : ?>
                                <a href="javascript: window.open('http://twitter.com/share?text=<?php echo urlencode(get_the_title())?>&url=<?php echo urlencode( get_permalink()) ?>','_blank', 'width=900, height=450')">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            <?php endif; ?>

                            <?php if ( $sharing_linkedin == 1 ): ?>
                                <a href="javascript: window.open('http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode( get_permalink()) ?>&title=<?php echo urlencode(get_the_title())?>','_blank', 'width=500, height=450')">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            <?php endif; ?>

                            <?php if ( $sharing_tumblr == 1 ) : ?>
                                <a href="javascript: window.open('http://www.tumblr.com/share/link?url=<?php echo urlencode( get_permalink()) ?>&name=<?php echo  urlencode( get_the_title()); ?>','_blank', 'width=500, height=450')">
                                    <i class="fa fa-tumblr"></i>
                                </a>
                            <?php endif; ?>

                            <?php if ( $sharing_pinterest == 1 ) : ?>
                                <?php
                                $_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                                $_img_src = '';
                                if (is_array($_img) && isset($_img[0])) {
                                    $_img_src = $_img[0];
                                }
                                ?>
                                <a href="javascript: window.open('http://pinterest.com/pin/create/button/?url=<?php echo urlencode( get_permalink()) ?>&media=<?php echo esc_attr($_img_src)?>&description=<?php echo urlencode( get_the_title()) ?>','_blank', 'width=900, height=450')">
                                    <i class="fa fa-pinterest"></i>
                                </a>
                            <?php endif; ?>
                            <?php if ($sharing_whatsup == 1): ?>
                                <a target="_blank" href="https://wa.me/?text=<?php echo urlencode( get_permalink())?>"><i class="fa fa-whatsapp"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
			<?php endif;

			if(ere_get_option('enable_print_property','1')=='1'):?>
            <div class="col-md-6 col-sm-12 text-center">
                <a href="javascript:void(0)" id="property-print"
                   data-ajax-url="<?php echo ERE_AJAX_URL; ?>" data-toggle="tooltip"
                   data-original-title="<?php esc_attr_e( 'Print', 'essential-real-estate' ); ?>"
                   data-property-id="<?php echo esc_attr( $property_id ); ?>"
                   class="btn btn-lg btn-primary" ><i class="fa fa-print"><?php esc_attr_e( 'Print this property','zommzeed'); ?></i></a>
            </div>
			<?php endif;?>
			<?php do_action('ere_single_property_action', $property_id, $post); ?>
        </div>
        </div>
    </div>



    <script>
        jQuery(document).ready(function () {
            var bounds = new google.maps.LatLngBounds();
            var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
            var isDraggable = w > 1024 ? true : false;
            var mapOptions = {
                mapTypeId: 'roadmap',
                draggable: isDraggable,
                scrollwheel: false
            };
            var map = new google.maps.Map(document.getElementById("<?php echo esc_attr($map_id) ?>"), mapOptions);

            var infoWindow = new google.maps.InfoWindow(), marker, i;
            var property_position = new google.maps.LatLng(<?php echo esc_html($lat) ?>, <?php echo esc_html($lng) ?>);
            bounds.extend(property_position);
            marker = new google.maps.Marker({
                position: property_position,
                map: map,
                title: '<?php echo esc_html($title) ?>',
                animation: google.maps.Animation.DROP,
                icon: '<?php echo esc_html($map_icons_path_marker) ?>'
            });
            google.maps.event.addListener(marker, 'click', (function (marker) {
                return function () {
                    infoWindow.setContent('<h6>' + '<?php echo esc_html($title) ?>' + '</h6>');
                    infoWindow.open(map, marker);
                }
            })(marker));
            map.fitBounds(bounds);
            var google_map_style = ere_property_map_vars.google_map_style;
            if (google_map_style !== '') {
                var styles = JSON.parse(google_map_style);
                map.setOptions({styles: styles});
            }
            var boundsListener = google.maps.event.addListener((map), 'idle', function (event) {
                this.setZoom(<?php echo esc_html($googlemap_zoom_level); ?>);
                google.maps.event.removeListener(boundsListener);
            });

            var directionsService = new google.maps.DirectionsService;
            var directionsDisplay = new google.maps.DirectionsRenderer;
            directionsDisplay.setMap(map);

            directionsDisplay.addListener('directions_changed', function () {
                ereGetTotalDistance(directionsDisplay.getDirections());
            });

            var ere_get_directions = function () {
                ereDisplayRoute(directionsService, directionsDisplay, marker);
            };

            document.getElementById('get-direction').addEventListener('click', ere_get_directions);

            var autocomplete = new google.maps.places.Autocomplete(document.getElementById('directions-input'));
            autocomplete.bindTo('bounds', map);

            function ereDisplayRoute(directionsService, directionsDisplay, marker) {
                directionsService.route({
                    origin: property_position,
                    destination: document.getElementById('directions-input').value,
                    travelMode: 'DRIVING'
                }, function (response, status) {
                    if (status === google.maps.DirectionsStatus.OK) {
                        marker.setVisible(false);
                        directionsDisplay.setDirections(response);
                    }
                });
            }

            function ereGetTotalDistance(result) {
                var total = 0;
                var unit = "metre";
                var myroute = result.routes[0];
                for (var i = 0; i < myroute.legs.length; i++) {
                    total += myroute.legs[i].distance.value;
                }
                unit = "<?php echo esc_html($map_directions_distance_units); ?>";
                document.getElementById('total').style.display = 'inline-block';
                if (unit == "kilometre") {
                    total = total / 1000;
                    document.getElementById('total').innerHTML = '<?php esc_html_e('Distance:','essential-real-estate'); ?> ' + total + ' km';
                }
                else if (unit == "mile") {
                    total = total * 0.000621371;
                    document.getElementById('total').innerHTML = '<?php esc_html_e('Distance:','essential-real-estate'); ?> ' + total + ' mi';
                }
                else {
                    document.getElementById('total').innerHTML = '<?php esc_html_e('Distance:','essential-real-estate'); ?> ' + total + ' m';
                }
            }
        });
    </script>
	<?php
	/**
	 * ere_single_property_after_summary hook.
	 *
	 * * @hooked comments_template - 90
	 */
	do_action( 'ere_single_property_after_summary' );
	?>
</div>