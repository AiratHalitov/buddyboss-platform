<?php
/**
 * BuddyBoss - Users Media
 *
 * @since BuddyBoss 1.0.0
 */
?>

<div class="bb-media-container member-media">
	<?php bp_get_template_part( 'members/single/parts/item-subnav' ); ?>

	<?php bp_get_template_part( 'document/theatre' ); ?>

	<?php
	switch ( bp_current_action() ) :

		// Home/Media
		case 'my-document':
			?>
				<div class="bp-document-listing">
					<div class="bp-media-header-wrap">
						<h2 class="bb-title"><?php _e( 'Documents', 'buddyboss' ); ?></h2>

						<?php
							bp_get_template_part( 'document/add-document' );
							bp_get_template_part( 'document/add-folder' );
						?>
						<div id="search-documents-form" class="media-search-form">
							<label for="media_document_search" class="bp-screen-reader-text"><?php _e( 'Search', 'buddyboss' ); ?></label>
							<input type="text" name="search" id="media_document_search" value="" placeholder="<?php _e( 'Search Documents', 'buddyboss' ); ?>" class="">
						</div>

					</div>
				</div><!-- .bp-document-listing -->
			<?php

			bp_nouveau_member_hook( 'before', 'document_content' );

			?>

			<div id="media-stream" class="media" data-bp-list="document">
				<div id="bp-ajax-loader"><?php bp_nouveau_user_feedback( 'member-document-loading' ); ?></div>
			</div><!-- .media -->

			<?php
			bp_nouveau_member_hook( 'after', 'document_content' );

			break;

		// Home/Media/Albums
		case 'folders':
			bp_get_template_part( 'document/single-folder' );
			break;

		// Any other
		default:
			bp_get_template_part( 'members/single/plugins' );
			break;
	endswitch;
	?>
</div>
