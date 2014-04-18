<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. 
 *
 * @package vertiMagazine theme
 */
?>

<section id="comments">
	<section id="commentsform">
				<div class="commentsheadline"><a name="hrcommentsform"><?php if (comments_open()) { ?>Leave a Comment<?php } ?></a></div>

<?php 
$comments_args = array(
        'label_submit'=>'Submit',
        'comment_notes_before' => '',
        'comment_notes_after' => '',
        'comment_field' => '<textarea id="comment" name="comment"></textarea>',
		'fields' => array(
		'author' => '<div class="fields"><p>' . '<input class="field" id="author" name="author" type="text" value="" /> '. '<label for="author">' . __( 'Name (required)', 'vertiMagazine' ) . '</label> ' . '</p>',
		'email' => '<p>'.'<input class="field" id="email" name="email" type="text" value="" />'.'<label for="email">' . __( 'Email (required)', 'vertiMagazine' ) . '</label> ' . '</p>',
		'url' => '<p>'.'<input class="field" id="url" name="url" type="text" value="" />'.'<label for="url">' . __( 'URL', 'vertiMagazine' ) . '</label>' . '</p></div>',
	),
);

comment_form($comments_args);

?>
	</section>
    <ul>
	<?php 
		wp_list_comments('type=comment&callback=mytheme_comment');
		
		function mytheme_comment($comment, $args, $depth) {
		   $GLOBALS['comment'] = $comment; ?>
		   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			 <div id="comment-<?php comment_ID(); ?>">
			  <div class="comment-author vcard">
              	 <?php $d = "d M Y"; ?>	
				 <?php printf(__('<cite class="commenttitle">%1$s <span>//%2$s</span></cite>'), get_comment_author_link(), get_comment_date($d)) ?>
			  </div>
			  <?php if ($comment->comment_approved == '0') : ?>
				 <em><?php _e('Your comment is awaiting moderation.', 'vertiMagazine') ?></em>
				 <br />
			  <?php endif; ?>
		
			  <?php comment_text() ?>
			 </div>
		<?php
        }
	?>
    </ul>
    <div class="pagination">
		<?php 
			if(function_exists('wp_paginate_comments')) { 	
			 	wp_paginate_comments();
			}
			else {
				paginate_comments_links( array('prev_text' => 'prev', 'next_text' => 'next'));
			}
    	?>
    </div>
  
</section><!--#comments end-->