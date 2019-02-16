<?php
/**
 * Group Members Loop template
 *
 * @since BuddyPress 3.0.0
 * @version 3.0.0
 */
$last_user_group_role_title = null;
?>

<?php if ( bp_group_has_members( bp_ajax_querystring( 'group_members' ) . '&type=group_role' ) ) : ?>

	<?php bp_nouveau_group_hook( 'before', 'members_content' ); ?>

	<?php bp_nouveau_pagination( 'top' ); ?>

	<?php bp_nouveau_group_hook( 'before', 'members_list' ); ?>

	<ul id="members-list" class="<?php bp_nouveau_loop_classes(); ?>">

		<?php
		while ( bp_group_members() ) :
			bp_group_the_member();
			$user_id =  bp_get_group_member_id();
			$group_id = bp_get_current_group_id();
			$user_group_role_title = bp_get_user_group_role_title( $user_id, $group_id );
		?>

			<?php if ( $last_user_group_role_title != $user_group_role_title ): $last_user_group_role_title = $user_group_role_title; ?>
			<li class="item-entry item-entry-header">
				<?php if ( groups_is_user_admin( $user_id, $group_id ) ) {
					esc_html_e( 'Organizers', 'buddyboss' );
				} elseif ( groups_is_user_mod( $user_id, $group_id ) ) {
					esc_html_e( 'Moderators', 'buddyboss' );
				} else {
					esc_html_e( 'Members', 'buddyboss' );
				} ?>
			</li>
			<?php endif; ?>

			<li <?php bp_member_class( array( 'item-entry' ) ); ?> data-bp-item-id="<?php echo esc_attr( bp_get_group_member_id() ); ?>" data-bp-item-component="members">

				<div class="list-wrap">

					<div class="item-avatar">
						<a href="<?php bp_group_member_domain(); ?>">
							<?php bp_group_member_avatar(); ?>
						</a>
					</div>

					<div class="item">

						<div class="item-block">
							<h3 class="list-title member-name"><?php bp_group_member_link(); ?></h3>


							<?php if( !empty( $user_group_role_title ) ) { ?>
								<p class="role item-meta"><?php echo $user_group_role_title; ?></p>
							<?php } ?>

							<p class="joined item-meta">
								<?php bp_group_member_joined_since(); ?>
							</p>

							<?php bp_nouveau_group_hook( '', 'members_list_item' ); ?>

							<?php bp_nouveau_members_loop_buttons(); ?>
						</div>

					</div>

				</div><!-- // .list-wrap -->

			</li>

		<?php endwhile; ?>

	</ul>

	<?php bp_nouveau_group_hook( 'after', 'members_list' ); ?>

	<?php bp_nouveau_pagination( 'bottom' ); ?>

	<?php bp_nouveau_group_hook( 'after', 'members_content' ); ?>

<?php else :

	bp_nouveau_user_feedback( 'group-members-none' );

endif;
