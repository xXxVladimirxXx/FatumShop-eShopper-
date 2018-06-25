<?php
// You can start editing here -- including this comment!
if ( have_comments() ) : ?>
    <h2>
        <?php
        $comments_number = get_comments_number();
        if ( 1 === $comments_number ) {
            /* translators: %s: post title */
            printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'twentysixteen' ), get_the_title() );
        } else {
            printf(
            /* translators: 1: number of comments, 2: post title */
                _nx(
                    '%1$s thought on &ldquo;%2$s&rdquo;',
                    '%1$s thoughts on &ldquo;%2$s&rdquo;',
                    $comments_number,
                    'comments title',
                    'twentysixteen'
                ),
                number_format_i18n( $comments_number ),
                get_the_title()
            );
        }
        ?>
    </h2>

    <?php
    function fatum_comment( $comment, $args, $depth ){
        $GLOBALS['comment'] = $comment;
        ?>
        <ul class="media-list"><!-- Выводим комментарии -->
            <li class="media" id="li-comment-<?php comment_ID(); ?>">
                <a class="pull-left">
                    <?php echo get_avatar( $comment,60 ); ?>
                </a>
                <div class="media-body comment-content">
                    <ul class="sinlge-post-meta">
                        <li><i class="fa fa-user"></i><?php comment_author(); ?></li>
                        <li><i class="fa fa-clock-o"></i> <?php comment_time(); ?></li>
                        <li><i class="fa fa-calendar"></i> <?php comment_date(); ?></li>
                    </ul>
                    <p><?php comment_text(); ?></p>
                    <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( ' <i class="fa fa-reply"></i>Ответить', 'twentyeleven' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div>
            </li>
        </ul>
    <?php } ?>
<?php endif; ?>