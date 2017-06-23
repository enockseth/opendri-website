<?php get_header(); ?>

<?php
$isTag = false;
// the_archive_title( '<h1 class="page-title">', '</h1>' );
if ( is_category() ) {
	$title = sprintf( __( '%s' ), single_cat_title( '', false ) );
} elseif ( is_tag() ) {
	$isTag = true;
	$title = sprintf( __( 'Tag: %s' ), single_tag_title( '', false ) );
}
global $post_type;

if ( $post_type === 'project' && is_post_type_archive() ) { ?>
	<?php show_admin_bar( false ); ?>
    <style type="text/css">
        html {
            margin-top: 0 !important;
        }
    </style>
	<?php
	$title             = 'Projects';
	$description       = '';
	$postsInAfrica     = get_term_by( 'slug', 'africa', 'category' );
	$postsInAfrica     = $postsInAfrica->count;
	$postsInEastAsia   = get_term_by( 'slug', 'east-asia-pacific', 'category' );
	$postsInEastAsia   = $postsInEastAsia->count;
	$postsInEurope     = get_term_by( 'slug', 'europe-and-central-asia', 'category' );
	$postsInEurope     = $postsInEurope->count;
	$postsInLatAm      = get_term_by( 'slug', 'latin-america-and-caribbean', 'category' );
	$postsInLatAm      = $postsInLatAm->count;
	$postsInMiddleEast = get_term_by( 'slug', 'middle-east-and-north-africa', 'category' );
	$postsInMiddleEast = $postsInMiddleEast->count;
	$postsInAll        = get_term_by( 'slug', 'non-wb-countries', 'category' );
	$postsInAll        = $postsInAll->count;
	$postsInSouthAsia  = get_term_by( 'slug', 'south-asia', 'category' );
	$postsInSouthAsia  = $postsInSouthAsia->count;
	$postsInGrp1       = get_term_by( 'slug', 'grp1', 'category' );
	$postsInGrp1       = $postsInGrp1->count;
	$postsInGrp2       = get_term_by( 'slug', 'grp2', 'category' );
	$postsInGrp2       = $postsInGrp2->count;
	$postsInGrp3       = get_term_by( 'slug', 'grp3', 'category' );
	$postsInGrp3       = $postsInGrp3->count;
	$postsInGrp4       = get_term_by( 'slug', 'grp4', 'category' );
	$postsInGrp4       = $postsInGrp4->count;
	
	$postsInTotal = array(
		'africa'     => $postsInAfrica,
		'eastasia'   => $postsInEastAsia,
		'europe'     => $postsInEurope,
		'latam'      => $postsInLatAm,
		'middleeast' => $postsInMiddleEast,
		'all'        => $postsInAll,
		'southasia'  => $postsInSouthAsia,
		'grp1'       => $postsInGrp1,
		'grp2'       => $postsInGrp2,
		'grp3'       => $postsInGrp3,
		'grp4'       => $postsInGrp4
	);
	
	echo '<script>var jsonValues = \'' . json_encode( $postsInTotal ) . '\'</script>';
	
	echo '	<div class="blue-bar-top" id="blue-bar">
				<div class="wrap wrapper filters">
						<div id="blue-bar-pick-pillar">
							<span class="title">filter by pillar:</span>
							<span class="option-pillar" data-option="open"><a href="#" data-option="open"><i class="img-pile-1"></i>Sharing Data</a></span>
							<span class="option-pillar" data-option="community"><a href="#" data-option="community"><i class="img-pile-2"></i>Collecting Data</a></span>
							<span class="option-pillar" data-option="risk"><a href="#" data-option="risk"><i class="img-pile-3"></i>Using Data</a></span>
						</div>
						<div class="container-region-filter">
							<span class="title" id="toggle-filter-region">filter by region</span>
							<ul class="region-filter" id="pick-region">
								<li><input type="text" id="searchCountries" placeholder="Search country"><i></i></li>
								<li class="pickable" data-option="africa" data-lat="6.3152" data-lng="5.80" data-zoom="3">africa</li>
								<li class="pickable" data-option="eastasia" data-lat="9.968" data-lng="118.3" data-zoom="3">east asia pacific</li>
								<li class="pickable" data-option="europe" data-lat="64.32" data-lng="99.84" data-zoom="3">europe and central asia</li>
								<li class="pickable" data-option="latam" data-lat="-10.314" data-lng="-68.027" data-zoom="3">latin america and caribbean</li>
								<li class="pickable" data-option="middleeast" data-lat="30.75" data-lng="28.03" data-zoom="4">middle east and north africa</li>
								<li class="pickable" data-option="southasia" data-lat="23.40" data-lng="77.08" data-zoom="4">south asia</li>
								<li class="pickable clear-map" data-option="reload" data-lat="27" data-lng="72">Clear map</li>
							</ul>
						</div>
				</div>
			</div>';
	echo '<div class="blue-bar-top-m" id="blue-bar-m">
				<h2><span></span> filter by pillar / region</h2>
				<ul id="blue-bar-pick-pillar">
					<li class="option-pillar" data-option="open"><a href="#" data-option="open"><i class="img-pile-1"></i>Sharing Data</a>
					</li>
					<li class="option-pillar" data-option="community"><a href="#" data-option="community"><i class="img-pile-2"></i>Collecting Data</a>
					</li>
					<li class="option-pillar" data-option="risk"><a href="#" data-option="risk"><i class="img-pile-3"></i>Using Data</a>
					</li>
				</ul>
				<ul class="region-filter" id="pick-region">
					<li><input type="text" id="searchCountries" placeholder="Search country"><i></i></li>
					<li class="pickable" data-option="africa" data-lat="6.3152" data-lng="5.80" data-zoom="3">africa</li>
					<li class="pickable" data-option="eastasia" data-lat="9.968" data-lng="118.3" data-zoom="3">east asia pacific</li>
					<li class="pickable" data-option="europe" data-lat="64.32" data-lng="99.84" data-zoom="3">europe and central asia</li>
					<li class="pickable" data-option="latam" data-lat="-10.314" data-lng="-68.027" data-zoom="3">latin america and caribbean</li>
					<li class="pickable" data-option="middleeast" data-lat="30.75" data-lng="28.03" data-zoom="4">middle east and north africa</li>
					<li class="pickable" data-option="southasia" data-lat="23.40" data-lng="77.08" data-zoom="4">south asia</li>
					<li class="pickable clear-map" data-option="reload" data-lat="27" data-lng="72" id="reset-map">Clear map</li>
				</ul>
			  </div>'; //end menu mobile filter projects	$hascornermap = false;
	echo '<div class="maplegend"><span><img src="https://opendri.org/wp-content/uploads/2016/07/marker@2x.png" /><i>Country Project</i></span><span><img src="https://opendri.org/wp-content/uploads/2016/07/markerYellow@2xnew.png"><i>Multiple Countries Project</i></span></div><div id="map" class="cdbmap"></div>';
} elseif (
	( $title === 'news' ||
	  $title === 'Open Data Platforms' ||
	  $title === 'Risk Visualization' ||
	  $title === 'Community Mapping' ||
	  $title === 'Africa' ||
	  $title === 'East Asia Pacific' ||
	  $title === 'Europe and Central Asia' ||
	  $title === 'Latin America and Caribbean' ||
	  $title === 'Middle East And North Africa' ||
	  $title === 'Non WB Countries' ||
	  $title === 'South Asia' )
	&& is_category()
) {
	$display_navi = true;
	$description  = '';
	
	echo '	<div class="blue-bar-top" id="blue-bar">
				<div class="wrap wrapper filters">
						<div id="blue-bar-pick-pillar">
							<span class="title">filter by pillar:</span>
							<span class="option-pillar" data-option="open"><a href="' . home_url() . '/category/pillars/open-data-platforms/" data-option="open"><i class="img-pile-1"></i>Sharing Data</a></span>
							<span class="option-pillar" data-option="community"><a href="' . home_url() . '/category/pillars/community-mapping/" data-option="community"><i class="img-pile-2"></i>Collecting Data</a></span>
							<span class="option-pillar" data-option="risk"><a href="' . home_url() . '/category/pillars/risk-visualization" data-option="risk"><i class="img-pile-3"></i>Using Data</a></span>
						</div>
						<div class="container-region-filter">
							<span class="title" id="toggle-filter-region">filter by region</span>
							<ul class="region-filter" id="pick-region">
								<li class="pickable" data-option="africa"><a href="' . home_url() . '/category/regions/africa/">Africa</a></li>
								<li class="pickable" data-option="eastasia"><a href="' . home_url() . '/category/regions/east-asia-pacific/">east asia pacific</a></li>
								<li class="pickable" data-option="europe"><a href="' . home_url() . '/category/regions/europe-and-central-asia/">europe and central asia</a></li>
								<li class="pickable" data-option="latam"><a href="' . home_url() . '/category/regions/latin-america-and-caribbean/">latin america and caribbean</a></li>
								<li class="pickable" data-option="middleeast"><a href="' . home_url() . '/category/regions/middle-east-and-north-africa/">middle east and north africa</a></li>
								<li class="pickable" data-option="southasia"><a href="' . home_url() . '/category/regions/south-asia/">south asia</a></li>
							</ul>
						</div>
				</div>
			</div>';
	echo '<div class="blue-bar-top-m" id="blue-bar-m">
				<h2><span></span> filter by pillar / region</h2>
				<ul id="blue-bar-pick-pillar">
					<li class="option-pillar" data-option="open"><a href="' . home_url() . '/category/pillars/open-data-platforms/" data-option="open"><i class="img-pile-1"></i>open data platforms</a></li>
					<li class="option-pillar" data-option="community"><a href="' . home_url() . '/category/pillars/community-mapping/" data-option="community"><i class="img-pile-2"></i>community mapping</a></li>
					<li class="option-pillar" data-option="risk"><a href="' . home_url() . '/category/pillars/risk-visualization/" data-option="risk"><i class="img-pile-3"></i>risk visualization</a></li>
				</ul>
				<ul class="region-filter" id="pick-region">
					<li><input type="text" id="searchCountries" placeholder="Search country"><i></i></li>
					<li class="pickable" data-option="africa"><a href="' . home_url() . '/category/regions/africa/">Africa</a></li>
					<li class="pickable" data-option="eastasia"><a href="' . home_url() . '/category/regions/east-asia-pacific/">east asia pacific</a></li>
					<li class="pickable" data-option="europe"><a href="' . home_url() . '/category/regions/europe-and-central-asia/">europe and central asia</a></li>
					<li class="pickable" data-option="latam"><a href="' . home_url() . '/category/regions/latin-america-and-caribbean/">latin america and caribbean</a></li>
					<li class="pickable" data-option="middleeast"><a href="' . home_url() . '/category/regions/middle-east-and-north-africa/">middle east and north africa</a></li>
					<li class="pickable" data-option="southasia"><a href="' . home_url() . '/category/regions/south-asia/">south asia</a></li>
				</ul>
			  </div>';
	
	$hasCornerMap = true;
} elseif ( $post_type === 'resource' && is_post_type_archive() ) {
	$title        = 'Resources';
	$hasCornerMap = true;
	$description  = 'At OpenDRI we are committed to increasing information that can empower individuals and their governments to reduce risk to natural hazards and climate change in their communities.  We’ve compiled a database of relevant resources to share what we have learned through our own projects and from the work of others.';
	echo '<div class="blue-bar-top resources" id="blue-bar">
					<div class="wrap wrapper">
						<span><a href="#publications">guides</a></span>
						<span><a href="#notes">short notes</a></span>
						<span><a href="#tools">tools and training materials</a></span>
						<span><a href="#other">other resources</a></span>
					</div>
				</div>';
}

?>
<div id="content" class="resources-page-list">
	<?php echo $hasCornerMap ? '<span class="corner-map"></span>' : ''; ?>
    <div id="inner-content" class="wrap">
        <div id="main" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
			<?php
			if ( $post_type !== 'project' ) { ?>
				<?php
				echo '<h1 class="page-title">' . $title . '</h1>';
				?>
                <p><?php echo $description; ?></p>
			<?php } // if projects ?>
            <div id="list-content" class="m-all index-row" role="news">
                <div class="row-container">
					<?php if ( $post_type === 'project' ) { ?>
                        <div class="card-third first-text project">
							<?php
							echo '<h1 class="page-title">' . $title . '</h1>';
							?>
                            <p><?php echo $description; ?></p>
                        </div>
					<?php } // if projects ?>
					<?php if ( $post_type === 'resource' && is_post_type_archive() ) : ?>
                        <div id="publications" class="resources-anchor"></div>
                        <h3 class="resource-list-title">Guides and Publications</h3>
                        <ul class="resource-list-new">
							<?php
							$posts_array = get_posts( array(
								'category_name'  => 'Resources Guides',
								'orderby'        => 'date',
								'order'          => 'DESC',
								'post_type'      => 'resource',
								'posts_per_page' => '1000',
								'post_status'    => 'publish'
							) );
							
							$countPosts = count( $posts_array );
							for ( $i = 0; $i < $countPosts; $i += 2 ) {
								?>
                                <li>
                                    <div class="thumbnail">
										<?php
										$image         = get_post_meta( $posts_array[ $i ]->ID, 'thumbnailPic', true );
										$fallbackImage = wp_get_attachment_image_src( get_post_thumbnail_id( $posts_array[ $i ]->ID ) );
										$image         = $image[0] ? $image : $fallbackImage[0];
										?>
                                        <a href="<?php echo esc_url( get_permalink( $posts_array[ $i ]->ID ) ) ?>"><img
                                                    src="<?php echo $image ?>" alt=""/></a>
                                        <div class="text-thumbnail">
                                            <span class="date"><?php echo mysql2date( 'j M Y', $posts_array[ $i ]->post_date ); ?></span>
                                            <span class="title"><a
                                                        href="<?php echo esc_url( get_permalink( $posts_array[ $i ]->ID ) ) ?>"><?php echo $posts_array[ $i ]->post_title ?></a></span>
											<?php
											echo '<p>' . $posts_array[ $i ]->post_excerpt . '</p>';
											?>
                                        </div>
                                    </div>
                                    <div class="thumbnail">
										<?php
										if ( (bool) $posts_array[ $i + 1 ] ) {
										$image         = get_post_meta( $posts_array[ $i + 1 ]->ID, 'thumbnailPic', true );
										$fallbackImage = wp_get_attachment_image_src( get_post_thumbnail_id( $posts_array[ $i + 1 ]->ID ) );
										$image         = $image[0] ? $image : $fallbackImage[0];
										?>
                                        <a href="<?php echo esc_url( get_permalink( $posts_array[ $i + 1 ]->ID ) ) ?>"><img
                                                    src="<?php echo $image ?>" alt=""/></a>
                                        <div class="text-thumbnail">
                                            <span class="date"><?php echo mysql2date( 'j M Y', $posts_array[ $i + 1 ]->post_date ); ?></span>
                                            <span class="title"><a
                                                        href="<?php echo esc_url( get_permalink( $posts_array[ $i + 1 ]->ID ) ) ?>"><?php echo $posts_array[ $i + 1 ]->post_title ?></a></span>
											<?php
											echo '<p>' . $posts_array[ $i + 1 ]->post_excerpt . '</p>';
											echo '</div>';
											}
											?>
                                        </div>
                                </li>
								<?php
							}
							?>
                        </ul>
                        <div id="notes" class="resources-anchor"></div>
                        <h3 class="resource-list-title">Short Notes</h3>
                        <ul class="resource-list-new">
							<?php
							$posts_array = get_posts( array(
								'category_name'  => 'Resources Short Notes',
								'orderby'        => 'date',
								'order'          => 'DESC',
								'post_type'      => 'resource',
								'posts_per_page' => '1000',
								'post_type'      => 'resource',
								'post_status'    => 'publish'
							) );
							$countPosts  = count( $posts_array );
							for ( $i = 0; $i < $countPosts; $i += 2 ) {
								?>
                                <li>
                                    <div class="thumbnail">
										<?php
										$image         = get_post_meta( $posts_array[ $i ]->ID, 'thumbnailPic', true );
										$fallbackImage = wp_get_attachment_image_src( get_post_thumbnail_id( $posts_array[ $i ]->ID ) );
										$image         = $image[0] ? $image : $fallbackImage[0];
										?>
                                        <a href="<?php echo esc_url( get_permalink( $posts_array[ $i ]->ID ) ) ?>"><img
                                                    src="<?php echo $image ?>" alt=""/></a>
                                        <div class="text-thumbnail">
                                            <span class="date"><?php echo mysql2date( 'j M Y', $posts_array[ $i ]->post_date ); ?></span>
                                            <span class="title"><a
                                                        href="<?php echo esc_url( get_permalink( $posts_array[ $i ]->ID ) ) ?>"><?php echo $posts_array[ $i ]->post_title ?></a></span>
											<?php
											echo '<p>' . $posts_array[ $i ]->post_excerpt . '</p>';
											?>
                                        </div>
                                    </div>
                                    <div class="thumbnail">
										<?php
										if ( (bool) $posts_array[ $i + 1 ] ) {
										$image         = get_post_meta( $posts_array[ $i + 1 ]->ID, 'thumbnailPic', true );
										$fallbackImage = wp_get_attachment_image_src( get_post_thumbnail_id( $posts_array[ $i + 1 ]->ID ) );
										$image         = $image[0] ? $image : $fallbackImage[0];
										?>
                                        <a href="<?php echo esc_url( get_permalink( $posts_array[ $i + 1 ]->ID ) ) ?>"><img
                                                    src="<?php echo $image ?>" alt=""/></a>
                                        <div class="text-thumbnail">
                                            <span class="date"><?php echo mysql2date( 'j M Y', $posts_array[ $i + 1 ]->post_date ); ?></span>
                                            <span class="title"><a
                                                        href="<?php echo esc_url( get_permalink( $posts_array[ $i + 1 ]->ID ) ) ?>"><?php echo $posts_array[ $i + 1 ]->post_title ?></a></span>
											<?php
											echo '<p>' . $posts_array[ $i + 1 ]->post_excerpt . '</p>';
											echo '</div>';
											}
											?>
                                        </div>
                                </li>
								<?php
							}
							?>
                        </ul>
                        <div id="tools" class="resources-anchor"></div>
                        <h3 class="resource-list-title">Tools and Training Materials</h3>
                        <ul class="resource-list-new">
							<?php
							$posts_array = get_posts( array(
								'category_name'  => 'Resources Tools and Training Materials',
								'orderby'        => 'date',
								'order'          => 'DESC',
								'post_type'      => 'resource',
								'posts_per_page' => '1000',
								'post_type'      => 'resource',
								'post_status'    => 'publish'
							) );
							$countPosts  = count( $posts_array );
							for ( $i = 0; $i < $countPosts; $i += 2 ) {
								?>
                                <li>
                                    <div class="thumbnail">
										<?php
										$image         = get_post_meta( $posts_array[ $i ]->ID, 'thumbnailPic', true );
										$fallbackImage = wp_get_attachment_image_src( get_post_thumbnail_id( $posts_array[ $i ]->ID ) );
										$image         = $image[0] ? $image : $fallbackImage[0];
										?>
                                        <a href="<?php echo esc_url( get_permalink( $posts_array[ $i ]->ID ) ) ?>"><img
                                                    src="<?php echo $image ?>" alt=""/></a>
                                        <div class="text-thumbnail">
                                            <span class="date"><?php echo mysql2date( 'j M Y', $posts_array[ $i ]->post_date ); ?></span>
                                            <span class="title"><a
                                                        href="<?php echo esc_url( get_permalink( $posts_array[ $i ]->ID ) ) ?>"><?php echo $posts_array[ $i ]->post_title ?></a></span>
											<?php
											echo '<p>' . $posts_array[ $i ]->post_excerpt . '</p>';
											?>
                                        </div>
                                    </div>
                                    <div class="thumbnail">
										<?php
										if ( (bool) $posts_array[ $i + 1 ] ) {
										$image         = get_post_meta( $posts_array[ $i + 1 ]->ID, 'thumbnailPic', true );
										$fallbackImage = wp_get_attachment_image_src( get_post_thumbnail_id( $posts_array[ $i + 1 ]->ID ) );
										$image         = $image[0] ? $image : $fallbackImage[0];
										?>
                                        <a href="<?php echo esc_url( get_permalink( $posts_array[ $i + 1 ]->ID ) ) ?>"><img
                                                    src="<?php echo $image ?>" alt=""/></a>
                                        <div class="text-thumbnail">
                                            <span class="date"><?php echo mysql2date( 'j M Y', $posts_array[ $i + 1 ]->post_date ); ?></span>
                                            <span class="title"><a
                                                        href="<?php echo esc_url( get_permalink( $posts_array[ $i + 1 ]->ID ) ) ?>"><?php echo $posts_array[ $i + 1 ]->post_title ?></a></span>
											<?php
											echo '<p>' . $posts_array[ $i + 1 ]->post_excerpt . '</p>';
											echo '</div>';
											}
											?>
                                        </div>
                                </li>
								<?php
							}
							?>
                        </ul>
                        <div id="other" class="resources-anchor"></div>
                        <h3 class="resource-list-title">Other Resources</h3>
                        <ul class="resource-list-new">
							<?php
							$posts_array = get_posts( array(
								'category_name'  => 'Resources Others',
								'orderby'        => 'date',
								'order'          => 'DESC',
								'post_type'      => 'resource',
								'posts_per_page' => '1000',
								'post_type'      => 'resource',
								'post_status'    => 'publish'
							) );
							$countPosts  = count( $posts_array );
							for ( $i = 0; $i < $countPosts; $i += 2 ) {
								?>
                                <li>
                                    <div class="thumbnail">
										<?php
										$image         = get_post_meta( $posts_array[ $i ]->ID, 'thumbnailPic', true );
										$fallbackImage = wp_get_attachment_image_src( get_post_thumbnail_id( $posts_array[ $i ]->ID ) );
										$image         = $image[0] ? $image : $fallbackImage[0];
										?>
                                        <a href="<?php echo esc_url( get_permalink( $posts_array[ $i ]->ID ) ) ?>"><img
                                                    src="<?php echo $image ?>" alt=""/></a>
                                        <div class="text-thumbnail">
                                            <span class="date"><?php echo mysql2date( 'j M Y', $posts_array[ $i ]->post_date ); ?></span>
                                            <span class="title"><a
                                                        href="<?php echo esc_url( get_permalink( $posts_array[ $i ]->ID ) ) ?>"><?php echo $posts_array[ $i ]->post_title ?></a></span>
											<?php
											echo '<p>' . $posts_array[ $i ]->post_excerpt . '</p>';
											?>
                                        </div>
                                    </div>
                                    <div class="thumbnail">
										<?php
										if ( (bool) $posts_array[ $i + 1 ] ) {
										$image         = get_post_meta( $posts_array[ $i + 1 ]->ID, 'thumbnailPic', true );
										$fallbackImage = wp_get_attachment_image_src( get_post_thumbnail_id( $posts_array[ $i + 1 ]->ID ) );
										$image         = $image[0] ? $image : $fallbackImage[0];
										?>
                                        <a href="<?php echo esc_url( get_permalink( $posts_array[ $i + 1 ]->ID ) ) ?>"><img
                                                    src="<?php echo $image ?>" alt=""/></a>
                                        <div class="text-thumbnail">
                                            <span class="date"><?php echo mysql2date( 'j M Y', $posts_array[ $i + 1 ]->post_date ); ?></span>
                                            <span class="title"><a
                                                        href="<?php echo esc_url( get_permalink( $posts_array[ $i + 1 ]->ID ) ) ?>"><?php echo $posts_array[ $i + 1 ]->post_title ?></a></span>
											<?php
											echo '<p>' . $posts_array[ $i + 1 ]->post_excerpt . '</p>';
											echo '</div>';
											}
											?>
                                        </div>
                                </li>
								<?php
							}
							?>
                        </ul>
                        <div class="additional-resources">
                            <a href="/tag/resource/">Explore additional resources featured in OpenDRI news</a>
                        </div>
					<?php else: ?>
					<?php if ( have_posts() ) :
					while ( have_posts() ) : the_post(); ?>
						<?php $cats = array();
						foreach ( wp_get_post_categories( $post->ID ) as $c ) {
							$cat    = get_category( $c );
							$cats[] = $cat->name;
						}
						?>


                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf ' ); ?> role="article">
							<?php
							$image         = get_post_meta( $post->ID, 'thumbnailPic', true );
							$fallbackImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) );
							$image         = $image[0] ? $image : $fallbackImage[0];
							$placeholder   = '/library/images/red-cross.jpg';
							if ( $post->post_type === 'resource' ) {
								$placeholder = '/library/images/resource-placeholder_1024.jpg';
							}
							$image = $image[0] ? $image : get_template_directory_uri() . $placeholder;
							?>
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><span
                                        class="img" style="background-image:url(<?php echo $image; ?>)"></span></a>

                            <header class="article-header">
                                <h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"
                                                              title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                </h1>
                            </header>
                            <section class="entry-content cf">
								<?php the_excerpt(); ?>
                            </section>
                            <footer class="article-footer cf">
								<?php if ( $isTag ) { ?>
                                    <p class="byline entry-meta vcard">
										<?php
										if ( $post->post_type === 'post' ) {
											$articleType = 'news';
											$linkType    = '/category/news';
										} elseif ( $post->post_type === 'project' ) {
											$articleType = 'project';
											$linkType    = '/project';
										} elseif ( $post->post_type === 'resource' ) {
											$articleType = 'resource';
											$linkType    = '/resource';
										}
										?>
                                        <span><a href="<?php echo home_url() . $linkType; ?>"><?php echo $articleType ?></a></span>
                                    </p>
								<?php } else { ?>
                                    <p class="byline entry-meta vcard">
												<span>
													<?php
                                                    $categories = get_the_category();
													foreach ( $categories as $category ) {
														if ( $category->cat_ID === 6 ||
														     $category->cat_ID === 7 ||
														     $category->cat_ID === 8
														) {
															echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . $category->cat_name . '</a> ';
														}
													}
													$countries = get_post_meta($post->ID, 'countries', true);
													foreach ( explode("\n", $countries) as $country ) {
													    if (strlen($country) <= 1) {
													        continue;
													    }
													    $tag = get_term_by('name', $country, 'post_tag') ? : get_term_by('slug', $country, 'post_tag');
														if (!$tag) {
															continue;
														}
                                                        echo '<a href="' . esc_url( get_tag_link( $tag ) ) . '">' . $country . '</a> ';
													}
													?>
												</span>
										<?php if ( $post_type !== 'project' ) { ?>
											<?php printf( __( '', 'bonestheme' ) . ' %1$s',
												'<time class="updated entry-time" datetime="' . get_the_time( 'Y-m-d' ) . '" itemprop="datePublished">' . get_the_time( 'd M' ) . '</time>'
											); ?>
										<?php } ?>
                                    </p>
								<?php } //end if tag?>
                            </footer>
                        </article>
					
					<?php endwhile; ?>
					<?php if ( $post_type === 'resource' && is_post_type_archive() ) : ?>
                        <div class="m-all index-row last-resources">
							<?php
							$image3 = '';
							$image4 = '';
							get_post_meta( 434, 'thumbnailPic', true );
							$image  = $image[0] ? $image : $fallbackImage[0];
							$image3 = $image[0] ? $image : get_template_directory_uri() . '/library/images/resource-placeholder_1024.jpg';
							?>
                            <a href="<?php echo esc_url( get_permalink( 434 ) ); ?>">
                                <article class="resource-cont" id="thirdFeatured">
                                    <section>
                                        <h3>Open Data for Resilience Initiative Field Guide</h3>
                                    </section>
                                </article>
                            </a>
							<?php
							$image  = get_post_meta( 449, 'thumbnailPic', true );
							$image4 = $image[0] ? $image : get_template_directory_uri() . '/library/images/resource-placeholder_1024.jpg';
							?>
                            <a href="<?php echo esc_url( get_permalink( 449 ) ); ?>">
                                <article class="resource-cont --scnd-img" id="fourthFeatured">
                                    <section>
                                        <h3>Planning An Open Cities Mapping Project</h3>
                                    </section>
                                </article>
                            </a>
                        </div>
                        <script type="text/javascript">
                          document.getElementsByTagName('head')[0].innerHTML += '<style>#firstFeatured:after{background-image:url(<?php echo $image1 ?>) !important;}#secondFeatured:after{background-image:url(<?php echo $image2 ?>) !important;}#thirdFeatured:after{background-image:url(<?php echo $image3 ?>) !important;}#fourthFeatured:after{background-image:url(<?php echo $image4 ?>) !important;}</style>';
                        </script>
					<?php endif; ?>

                </div>
            </div>
		<?php if ( (bool) $display_navi ) {
			bones_page_navi();
		} ?>
		
		<?php else : ?>

            <div id="content">

                <div id="inner-content" class="wrap cf">

                    <div id="main" class="m-all t-2of3 d-5of7 cf no-results" role="main" itemscope
                         itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">


                        <section class="search">

                            <p><?php get_search_form(); ?></p>

                        </section>
                        <section>
                            <a href="<?php echo home_url(); ?>" class="home-404">go to homepage</a>
                        </section>
                    </div>

                </div>

            </div>
			
			<?php endif; ?>
			<?php endif; ?>

        </div>

    </div>

</div>
</div>

<?php get_footer(); ?>
