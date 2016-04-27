<?php get_header(); ?>

<?php
$istag = false;
// the_archive_title( '<h1 class="page-title">', '</h1>' );
if ( is_category() ) {
	$title = sprintf( __( '%s' ), 	   single_cat_title( '', false ) );
} elseif ( is_tag() ) {
	$istag = true;
	$title = sprintf( __( 'Tag: %s' ), single_tag_title( '', false ) );
}
global $post_type;

if(is_post_type_archive() && $post_type=='project') {
	$title = 'Projects';
	$description = '';
	$postsInAfrica = get_term_by('slug','africa','category');
	$postsInAfrica = $postsInAfrica->count;
	$postsIneastasia = get_term_by('slug','east-asia-pacific','category');
	$postsIneastasia = $postsIneastasia->count;
	$postsIneurope = get_term_by('slug','europe-and-central-asia','category');
	$postsIneurope = $postsInEurope->count;
	$postsInlatam = get_term_by('slug','latin-america-and-caribbean','category');
	$postsInlatam = $postsInlatam->count;
	$postsInmiddleeast = get_term_by('slug','middle-east-and-north-africa','category');
	$postsInmiddleeast = $postsInmiddleeast->count;
	$postsInall = get_term_by('slug','non-wb-countries','category');
	$postsInall = $postsInall->count;
	$postsInsouthasia = get_term_by('slug','south-asia','category');
	$postsInsouthasia = $postsInsouthasia->count;

	$postsInTotal = array('africa' => $postsInAfrica,
						  'eastasia' => $postsIneastasia,
						  'europe' => $postsInEurope,
						  'latam' => $postsInlatam,
						  'middleeast' => $postsInmiddleeast,
						  'all' => $postsInall,
						  'southasia' => $postsInsouthasia);

	echo '<script>var jsonValues = \''.json_encode($postsInTotal).'\'</script>';

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
	echo '<div id="map" class="cdbmap"></div>';
} elseif (is_category() && 
	($title === 'news' 							|| 
	 $title === 'Open Data Platforms' 			|| 
	 $title === 'Risk Visualization' 			|| 
	 $title === 'Community Mapping'   			||
	 $title === 'Africa' 			  			||
	 $title === 'East Asia Pacific'   			||
	 $title === 'Europe and Central Asia'   	||
	 $title === 'Latin America and Caribbean'   ||
	 $title === 'Middle East And North Africa'  ||
	 $title === 'Non WB Countries' 				||
	 $title === 'South Asia')) {
	$display_navi = true;
	$description = '';

	echo '	<div class="blue-bar-top" id="blue-bar">
				<div class="wrap wrapper filters">
						<div id="blue-bar-pick-pillar">
							<span class="title">filter by pillar:</span>
							<span class="option-pillar" data-option="open"><a href="'.home_url().'/category/pillars/open-data-platforms/" data-option="open"><i class="img-pile-1"></i>Sharing Data</a></span>
							<span class="option-pillar" data-option="community"><a href="'.home_url().'/category/pillars/community-mapping/" data-option="community"><i class="img-pile-2"></i>Collecting Data</a></span>
							<span class="option-pillar" data-option="risk"><a href="'.home_url().'/category/pillars/risk-visualization" data-option="risk"><i class="img-pile-3"></i>Using Data</a></span>
						</div>
						<div class="container-region-filter">
							<span class="title" id="toggle-filter-region">filter by region</span>
							<ul class="region-filter" id="pick-region">
								<li class="pickable" data-option="africa"><a href="'.home_url().'/category/regions/africa/">Africa</a></li>
								<li class="pickable" data-option="eastasia"><a href="'.home_url().'/category/regions/east-asia-pacific/">east asia pacific</a></li>
								<li class="pickable" data-option="europe"><a href="'.home_url().'/category/regions/europe-and-central-asia/">europe and central asia</a></li>
								<li class="pickable" data-option="latam"><a href="'.home_url().'/category/regions/latin-america-and-caribbean/">latin america and caribbean</a></li>
								<li class="pickable" data-option="middleeast"><a href="'.home_url().'/category/regions/middle-east-and-north-africa/">middle east and north africa</a></li>
								<li class="pickable" data-option="southasia"><a href="'.home_url().'/category/regions/south-asia/">south asia</a></li>
							</ul>
						</div>
				</div>
			</div>';
	echo '<div class="blue-bar-top-m" id="blue-bar-m">
				<h2><span></span> filter by pillar / region</h2>
				<ul id="blue-bar-pick-pillar">
					<li class="option-pillar" data-option="open"><a href="'.home_url().'/category/pillars/open-data-platforms/" data-option="open"><i class="img-pile-1"></i>open data platforms</a></li>
					<li class="option-pillar" data-option="community"><a href="'.home_url().'/category/pillars/community-mapping/" data-option="community"><i class="img-pile-2"></i>community mapping</a></li>
					<li class="option-pillar" data-option="risk"><a href="'.home_url().'/category/pillars/risk-visualization/" data-option="risk"><i class="img-pile-3"></i>risk visualization</a></li>
				</ul>
				<ul class="region-filter" id="pick-region">
					<li><input type="text" id="searchCountries" placeholder="Search country"><i></i></li>
					<li class="pickable" data-option="africa"><a href="'.home_url().'/category/regions/africa/">Africa</a></li>
					<li class="pickable" data-option="eastasia"><a href="'.home_url().'/category/regions/east-asia-pacific/">east asia pacific</a></li>
					<li class="pickable" data-option="europe"><a href="'.home_url().'/category/regions/europe-and-central-asia/">europe and central asia</a></li>
					<li class="pickable" data-option="latam"><a href="'.home_url().'/category/regions/latin-america-and-caribbean/">latin america and caribbean</a></li>
					<li class="pickable" data-option="middleeast"><a href="'.home_url().'/category/regions/middle-east-and-north-africa/">middle east and north africa</a></li>
					<li class="pickable" data-option="southasia"><a href="'.home_url().'/category/regions/south-asia/">south asia</a></li>
				</ul>
			  </div>'; //end menu mobile filter projects	$hascornermap = false;
	
	$hascornermap = true;
} elseif (is_post_type_archive() && $post_type=='resource'){
	$title = 'Resources';
	$hascornermap = true;
	$description = 'At OpenDRI we are committed to increasing information that can empower individuals and their governments to reduce risk to natural hazards and climate change in their communities.  We’ve compiled a database of relevant resources to share what we have learned through our own projects and from the work of others.';
}

?>
			<div id="content">
						<?php echo ($hascornermap) ? '<span class="corner-map"></span>' : ''; ?>
				<div id="inner-content" class="wrap">
						<main id="main" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
							<?php 
							if ($post_type!='project') { ?>
							<?php
							echo '<h1 class="page-title">'.$title.'</h1>';
							?>
							<p><?php echo $description; ?></p>
							<?php } // if projects ?>
							<div id="list-content" class="m-all index-row" role="news">
								<div class="row-container">
									<?php if ($post_type=='project') { ?>
									<div class="card-third first-text project">
										<?php
										echo '<h1 class="page-title">'.$title.'</h1>';
										?>
										<p><?php echo $description; ?></p>
									</div>
								<?php } // if projects ?>
									<?php if (is_post_type_archive() && $post_type=='resource') : ?>
									<div class="m-all index-row last-resources">
									<?php
										$args = array( 'numberposts' => '1', 'category' => 16, 'order' => 'DESC', 'post_type' => 'resource', 'post_status' => 'publish' );
										$featured_col = wp_get_recent_posts( $args );
										$image1 = '';
										$image2 = '';
										foreach( $featured_col as $featured ) {
											$image = get_post_meta($featured["ID"], 'thumbnailPic', true);
											$image1 = ($image[0]) ? $image : get_template_directory_uri().'/library/images/resource-placeholder_1024.jpg';
									?>
										<a href="<?php echo $featured["guid"]; ?>" >
											<article class="resource-cont"  id="firstFeatured">
												<section>
													<h3><?php echo $featured["post_title"]; ?></h3>
												</section>
											</article>
										</a>
									<?php } 
										$args = array( 'numberposts' => '1', 'category' => 16,  'order' => 'DESC', 'offset' => '1', 'post_type' => 'resource', 'post_status' => 'publish' );
										$featured_col = wp_get_recent_posts( $args );
										foreach( $featured_col as $featured ) {
											$image = get_post_meta($featured["ID"], 'thumbnailPic', true);
											$image2 = ($image[0]) ? $image : get_template_directory_uri().'/library/images/resource-placeholder_1024.jpg';
									 ?>
										<a href="<?php echo $featured["guid"]; ?>"  >
											<article class="resource-cont --scnd-img"  id="secondFeatured">
												<section>
													<h3><?php echo $featured["post_title"]; ?></h3>
												</section>
											</article>
										</a>
									<?php } ?>
									</div>
									<ul class="resource-list">
									<?php endif; ?> 
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							 	 <?php $cats = array();
									foreach(wp_get_post_categories($post->ID) as $c)
									{
										$cat = get_category($c);
										array_push($cats,$cat->name);
									}
								?>
								<?php if (is_post_type_archive() && $post_type=='resource') : ?>
								<li>
									<div>
										<span class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></span>
									</div>
									<div>
										<span class="size"><?php the_date() ?></span>
										<span class="size"><?php the_tags(); ?></span>
									</div>
								</li>
								<?php else: ?>
									<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf '); ?> role="article">
										<?php 
										$image = get_post_meta($post->ID, 'thumbnailPic', true);
										$placeholder = '/library/images/red-cross.jpg';
										if ($post->post_type == 'resource') {
											$placeholder = '/library/images/resource-placeholder_1024.jpg';
										}
										$image = ($image[0]) ? $image : get_template_directory_uri().$placeholder;
										?>
		            					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><span class="img" style="background-image:url(<?php echo $image; ?>)"></span></a>

										<header class="article-header">
											<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
										</header>
										<section class="entry-content cf">
											<?php the_excerpt(); ?>
										</section>
										<footer class="article-footer cf">
											<?php if ($istag) { ?>
											<p class="byline entry-meta vcard">
												<?php
													if 	($post->post_type=='post'){		   $articletype = 'news'; $linktype='/category/news';}
													elseif ($post->post_type=='project'){  $articletype = 'project'; $linktype='/project';}
													elseif ($post->post_type=='resource'){ $articletype = 'resource'; $linktype='/resources';}
												?>
												<span><a href="<?php echo home_url().$linktype;?>"><?php echo $articletype ?></a></span>
											</p>
											<?php } else { ?>
											<p class="byline entry-meta vcard">
												<span>
													<?php
													foreach((get_the_category()) as $category) { 
														if ($category->cat_ID == 6 || 
															$category->cat_ID == 7 ||
															$category->cat_ID == 8) {
													    	echo '<a href="'.esc_url( get_category_link( $category->term_id ) ).'">'.$category->cat_name . '</a> '; 
														}
													} 
													?>
												</span>
												<?php if($post_type!='project') { ?>
					                            <?php printf( __( '', 'bonestheme' ).' %1$s',
					   								/* the time the post was published */
					   								'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time('d M') . '</time>'
												); ?>
												<?php } ?>
											</p>
											<?php } //end if tag?>
										</footer>
									</article>
								<?php endif; ?>

								<?php endwhile; ?>
								<?php if (is_post_type_archive() && $post_type=='resource') : ?>
									</ul>
									<div class="m-all index-row last-resources">
									<?php
										$image3= '';
										$image4= '';
											get_post_meta(434, 'thumbnailPic', true);
											$image3 = ($image[0]) ? $image : get_template_directory_uri().'/library/images/resource-placeholder_1024.jpg';
									?>
										<a href="<?php echo esc_url( get_permalink(434) ); ?>" >
											<article class="resource-cont"  id="thirdFeatured">
												<section>
													<h3>Open Data for Resilience Initiative Field Guide</h3>
												</section>
											</article>
										</a>
									<?php  
											$image = get_post_meta(449, 'thumbnailPic', true);
											$image4 = ($image[0]) ? $image : get_template_directory_uri().'/library/images/resource-placeholder_1024.jpg';
									 ?>
										<a href="<?php echo esc_url( get_permalink(449) ); ?>"  >
											<article class="resource-cont --scnd-img"  id="fourthFeatured">
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
									<?php if (!!$display_navi){ bones_page_navi();} ?>

							<?php else : ?>

									<div id="content">

				<div id="inner-content" class="wrap cf">

					<main id="main" class="m-all t-2of3 d-5of7 cf no-results" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">


							<section class="search">

									<p><?php get_search_form(); ?></p>

							</section>
							<section>
								<a href="<?php echo home_url(); ?>" class="home-404">go to homepage</a>
							</section>
					</main>

				</div>

			</div>

							<?php endif; ?>

						</main>

					<?php // get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
