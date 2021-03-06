<?php get_header(); ?>
	<div id="map-fake">
		<div class="what-list">
			<h3>OpenDRI brings the philosophies and practices of the global open data
movement to the challenges of reducing vulnerability and building
resilience to natural hazards and the impacts of climate change across the globe.</h3>
			<nav>
				<?php
				$titles   = ['Sharing Data','Collecting Data','Using Data'];
				$params   = ['sharing-data','collecting-data','using-data'];
				for ($i = 0; $i < count($titles); $i++) {
					echo '<a href="'.home_url().'/about/#'.$params[$i].'-anchor"><span data-opt="opt'.($i+1).'">';
						echo '<i class="img-pile-'.($i+1).'"></i>';
						echo $titles[$i];
					echo '</span></a>';
				}

				?>

			</nav>
			<div class="explore-buttons">
				<div class="what-explore">
					<a href="<?php echo home_url(); ?>/about">opendri in 110 sec</a>
				</div>
				<div class="what-explore">
					<a href="<?php echo home_url(); ?>/project">explore projects</a>
				</div>
			</div>
		</div>
	</div>
	<div id="content">
		<div id="inner-content" class="wrap">
			<div class="index-title">
				<h3>news</h3>
			</div>
			<div id="news" class="m-all index-row" role="news" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
				<div class="row-container">
					<?php
						$args = array( 'numberposts' => '4', 'category' => 'news', 'post_status' => 'publish' );
						$recent_posts = wp_get_recent_posts( $args );
						foreach( $recent_posts as $recent ){  // start loop
					?>
					<article id="post-<?php echo $recent["ID"]; ?>" <?php post_class( 'cf' ); ?> role="article">
						<?php
							$image = get_post_meta($recent["ID"], 'thumbnailPic', true);
							//$fallbackimg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ));
							$fallbackimg = wp_get_attachment_image_src( get_post_thumbnail_id( $recent["ID"] ));

							//$image = ($image[0]) ? $image : $fallbackimg[0];
							$image = (!empty($image)) ? $image : $fallbackimg[0];
							$image = ($image[0]) ? $image : get_template_directory_uri().'/library/images/red-cross.jpg';
						?>
            			<a href="<?php echo get_permalink($recent["ID"]); ?>" rel="bookmark" title="<?php echo $recent["post_title"]; ?>"><span class="img" style="background-image:url(<?php echo $image; ?>)"></span></a>

						<header class="article-header">
							<h1 class="h2 entry-title"><a href="<?php echo get_permalink($recent["ID"]); ?>" rel="bookmark" title="<?php echo $recent["post_title"]; ?>"><?php echo $recent["post_title"]; ?></a></h1>
						</header>
						<section class="entry-content cf related">
								<?php
									$content = apply_filters( 'the_content', $recent["post_content"] );
								    $content = str_replace( ']]>', ']]&gt;', $content );
								    echo wp_strip_all_tags($content);
								?>
						</section>
						<footer class="article-footer cf">
							<p class="byline entry-meta vcard">
	                            <?php printf( __( '', 'bonestheme' ).' %1$s',
	   								/* the time the post was published */
	   								'<time class="updated entry-time" datetime="' . get_the_date('Y-m-d', $recent['ID']) . '" itemprop="datePublished">' . get_the_date('d M', $recent['ID']) . '</time>'
								); ?>
							</p>
						</footer>
					</article>
					<?php } ?>
				</div>
				<div class="card-third twitter-timeline-container">
	        <div class="twitter mod-tweets">
	          <span><i class="twt-img"></i></span>
	          <h3>Latest tweets</h3>
            <a class="twitter-timeline" href="https://twitter.com/GFDRR/lists/disaster-risk-management" data-widget-id="936284078080487425">A Twitter List by GFDRR</a>
						<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					</div>
				</div>
			</div>
			<div class="index-separator">
				<span></span>
				<a href="<?php echo home_url(); ?>/category/news"><span>view all news</span></a>
				<span></span>
			</div>
			<div class="index-title">
				<h3>projects</h3>
			</div>
			<div id="projects" class="m-all cf index-row" role="projects" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
				<div class="row-container">
					<?php
						$args = array( 'numberposts' => '6', 'post_type' => 'project', 'post_status' => 'publish' );
						$recent_posts = wp_get_recent_posts( $args );
						foreach( $recent_posts as $recent ){  // start loop
					?>
					<article id="post-<?php echo $recent["ID"]; ?>" <?php post_class( 'cf' ); ?> role="article">
						<?php
							$image = get_post_meta($recent["ID"], 'thumbnailPic', true);
							$fallbackimg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ));
							$image = ($image[0]) ? $image : $fallbackimg[0];
							$image = ($image[0]) ? $image : get_template_directory_uri().'/library/images/red-cross.jpg';
						?>
            			<a href="<?php echo get_permalink($recent["ID"]); ?>" rel="bookmark" title="<?php echo $recent["post_title"]; ?>"><span class="img" style="background-image:url(<?php echo $image; ?>)"></span></a>

						<header class="article-header">
							<h1 class="h2 entry-title"><a href="<?php echo get_permalink($recent["ID"]); ?>" rel="bookmark" title="<?php echo $recent["post_title"]; ?>"><?php echo $recent["post_title"]; ?></a></h1>
						</header>
						<section class="entry-content cf related">
								<?php
									$content = apply_filters( 'the_content', $recent["post_content"] );
								    $content = str_replace( ']]>', ']]&gt;', $content );
								    echo wp_strip_all_tags($content);
								?>
						</section>
						<footer class="article-footer cf">
							<p class="byline entry-meta vcard">
								<span>
								<?php
								foreach(wp_get_post_categories($recent["ID"]) as $category) {
									$category = get_category( $category );
								    if ($category->cat_ID == 6 ||
										$category->cat_ID == 7 ||
										$category->cat_ID == 8) {
								    	echo '<a href="'.esc_url( get_category_link( $category->term_id ) ).'">'.$category->cat_name . '</a> ';
									}
								}
								?>
								</span>

							</p>
						</footer>
					</article>
					<?php } ?>
				</div>
			</div>
			<div class="index-separator">
				<span></span>
				<a href="<?php echo home_url(); ?>/project"><span>view all projects</span></a>
				<span></span>
			</div>
			<div id="resources" class="m-all index-row" role="resources" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
				<div class="row-container">
					<div class="card-third first-text">
						<h3>resources</h3>
						<p>At OpenDRI we are committed to increasing information that can empower individuals and their governments to reduce risk to natural hazards and climate change in their communities.  We’ve compiled a database of relevant resources to share what we have learned through our own projects and from the work of others.</p>
						<a href="<?php echo home_url(); ?>/resource"><span>view all resources</span></a>
					</div>
				</div>
				<div class="row-container">
					<a href="https://opendri.org/resource/planning-an-open-cities-mapping-project/">
						<article class="resource-cont"  style="background-image:url(https://opendri.org/wp-content/uploads/2016/07/opendri_fg_web_20140629b_0.jpg)">
							<section>
								<h3>Open Data for Resilience Initiative Field Guide</h3>
							</section>
						</article>
					</a>
				</div>
			</div>
			<div class="m-all cf index-row last-resources" role="resources" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
				<div class="row-container">
					<a href="https://opendri.org/resource/planning-an-open-cities-mapping-project/">
						<article class="resource-cont --scnd-img"  style="background-image:url(https://opendri.org/wp-content/uploads/2014/12/Community-Mapping-planning_backcover72dpi-01.jpg)">
							<section>
								<h3>Planning An Open Cities Mapping Project</h3>
							</section>
						</article>
					</a>
					<a href="https://opendri.org/resource/opendri-policy-note-principles/">
						<article class="resource-cont" style="background-image:url(https://opendri.org/wp-content/uploads/2016/07/OpenDRI_Principles-1.png)">
							<section>
								<h3>OpenDRI Principles</h3>
							</section>
						</article>
					</a>
					<ul class="resource-list home">
						<?php
						$args = array( 'numberposts' => '4', 'orderby' => 'date','order' => 'DESC', 'post_type' => 'resource','post_status' => 'publish' );
						$resources_recent = wp_get_recent_posts( $args );
						foreach( $resources_recent as $recent_res ) {
					?>
						<li>
							<a href="<?php echo esc_url( get_permalink($recent_res["ID"]))?>">
								<p><span class="title"><?php echo $recent_res["post_title"]?></span><span class="format"></span></p>
								<p><span class="name"></span><span class="size"><?php echo date('d M', strtotime($recent_res['post_date'])) ?></span>
								</p>
							</a>
						</li>
					<?php } // end foreach ?>
					</ul>
				</div>
			</div>
			<?php /* get_sidebar(); */ ?>
		</div>
	</div>
<?php get_footer(); ?>
