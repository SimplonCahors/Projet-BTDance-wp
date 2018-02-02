<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage qucreative
 */











if ( post_password_required() ) {
	return;
}

global $current_user;
global $qucreative_theme_data;


$logged_in_name = '';

if(isset($current_user) && isset($current_user->data) && isset($current_user->data->display_name)){
	$logged_in_name = $current_user->data->display_name;
}
?>

<div id="comments" class="comments-area blog-comments">

	<?php if ( have_comments() ){ ?>


		<ul class="itemCommentsList">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 60,

					'walker' => new QuCreative_Comments_Walker(),
				) );
			?>
		</ul><!-- .comment-list -->

		<?php if ( function_exists( 'the_comments_pagination' ) ) {
			the_comments_pagination();
		} else {
			the_comments_navigation();
		}; ?>

	<?php }  ?>

	<?php
		// -- If comments are closed and there are comments, lets leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
	?>
		<p class="no-comments"><em><?php echo esc_html__( 'Comments are closed.', 'qucreative' ); ?></em></p>
	<?php
		}

	$args = array(
		'id_form'           => 'itemCommentsForm',
		'class_form'      => 'comment-form',
		'id_submit'         => 'submit',
		'class_submit'      => 'submit submit-comment h6 btn-full-red',
		'name_submit'       => 'submit',
		'title_reply_before'       => '<h4 id="reply-title" class="comment-reply-title">',
		'title_reply_after'       => '</h4>',
		'title_reply'       => esc_html__( 'Leave a comment','qucreative' ),
		'title_reply_to'    => esc_html__( 'Leave a comment to %s','qucreative' ),
		'cancel_reply_link' => esc_html__( 'Cancel comment','qucreative' ),
		'label_submit'      => esc_html__( 'Submit Comment','qucreative' ),
		'format'            => 'html5',

		'comment_field' =>  '<div class="row"><div class="col-md-12"><textarea class="inputbox font-group-5" id="commentText" name="comment" cols="45" rows="8" aria-required="true"  onfocus=\'if(this.value=="'.esc_html__("Comment...",'qucreative').'") this.value=""\' onblur=\'if(this.value=="") this.value="'.esc_html__("Comment...",'qucreative').'"\'>'.esc_html__("Comment...",'qucreative').'</textarea></div></div>',

		'must_log_in' => '<p class="must-log-in">' .
		                 wp_kses(sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.','qucreative' ),
				wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
			),array(
			                 'a' => array(
				                 'href' => array(),
				                 'title' => array()
			                 ),
			                 'br' => array(),
			                 'em' => array(),
			                 'strong' => array(),
		                 )) . '</p>',

		'logged_in_as' => '<p class="logged-in-as">' .

                          esc_html__("Logged in as",'qucreative').' '.'<a href="'.admin_url( 'profile.php' ).'">'.$logged_in_name.'</a>'.' - '.'<a href="'.wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ).'" title="'.esc_html__("Log out of this account",'qucreative').'">'.''.esc_html__("Log out?",'qucreative').'</a>'.'</p>',

		'comment_notes_before' => '<p class="comment-notes">' .
		                          esc_html__( 'Your email address will not be published','qucreative' ) .
			'</p>',

		'comment_notes_after' => '',


	);

    comment_form($args);

?>

</div><!-- .comments-area -->
