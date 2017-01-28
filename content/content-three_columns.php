<?php
/**
 * Content: Three Columns
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $_pojo_parent_id;
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( apply_filters( 'pojo_post_classes', array( 'grid-item col-md-4 col-sm-6 col-xs-12' ), get_post_type() ) ); ?>>
	<div class="inbox">
		<?php if ( $image_url = Pojo_Thumbnails::get_post_thumbnail_url( array( 'width' => '360', 'height' => '240', 'crop' => true, 'placeholder' => true ) ) ) : ?>
			<figure class="image-link">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
					<img src="<?php echo $image_url; ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="media-object" />
					<div class="overlay-image"></div>
					<div class="overlay-title">
						<?php if ( po_archive_metadata_show( 'readmore', $_pojo_parent_id ) ) : ?>
							<figcaption><?php echo po_get_archive_readmore_text( $_pojo_parent_id ); ?></figcaption>
						<?php endif; ?>
					</div>
				</a>
			</figure>
		<?php endif; ?>

		<div class="caption">
			<h4 class="grid-heading entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h4>

			<?php po_print_archive_excerpt( $_pojo_parent_id ); ?>

			<div class="entry-meta">
				<?php if ( po_archive_metadata_show( 'date', $_pojo_parent_id ) ) : ?>
					<span><time datetime="<?php the_time('o-m-d'); ?>" class="entry-date date published updated"><?php echo get_the_date(); ?></time></span>
				<?php endif; ?>
				<?php if ( po_archive_metadata_show( 'time', $_pojo_parent_id ) ) : ?>
					<span class="entry-time"><?php echo get_the_time(); ?></span>
				<?php endif; ?>
				<?php if ( po_archive_metadata_show( 'comments', $_pojo_parent_id ) ) : ?>
					<span class="entry-comment"><?php comments_popup_link( __( 'No Comments', 'pojo' ), __( 'One Comment', 'pojo' ), __( '% Comments', 'pojo' ), 'comments' ); ?></span>
				<?php endif; ?>
				<?php if ( po_archive_metadata_show( 'author', $_pojo_parent_id ) ) : ?>
					<span class="entry-user vcard author"><a class="fn" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="author"><?php echo get_the_author(); ?></a></span>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>