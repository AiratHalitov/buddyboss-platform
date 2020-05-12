<?php
/**
 * BuddyBoss - Document Folder Create
 *
 * @since BuddyBoss 1.0.0
 * @package BuddyBoss\Core
 */

?>

<div id="bp-media-create-folder" style="display: none;">
	<transition name="modal">
		<div class="modal-mask bb-white bbm-model-wrap">
			<div class="modal-wrapper">
				<div id="boss-media-create-album-popup" class="modal-container has-folderlocationUI">
					<header class="bb-model-header">
						<h4><?php esc_html_e( 'Create new folder', 'buddyboss' ); ?></h4>
						<a class="bb-model-close-button" id="bp-media-create-folder-close" href="#"><span class="dashicons dashicons-no-alt"></span></a>
					</header>
					<div class="bb-field-wrap">
						<label for="bb-album-title" class="bb-label"><?php esc_html_e( 'Title', 'buddyboss' ); ?></label>
						<input id="bb-album-title" type="text" placeholder="<?php esc_html_e( 'Enter Folder Title', 'buddyboss' ); ?>" />
					</div>
					<?php
					if ( ! bp_is_group() ) :
						bp_get_template_part( 'document/document-privacy' );
					endif;
					?>
					<footer class="bb-model-footer">
						<a class="button" id="bp-media-create-folder-submit" href="#"><?php esc_html_e( 'Create new folder', 'buddyboss' ); ?></a>
					</footer>

				</div>
			</div>
		</div>
	</transition>
</div>
