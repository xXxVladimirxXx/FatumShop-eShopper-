<?php get_header(); ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <?php get_sidebar(); ?>
                </div>
				<div class="col-sm-9">
					<div class="blog-post-area">
						<div class="single-blog-post">
						<?php while ( have_posts() ) : the_post(); ?>
							<h3><?php the_title(); ?></h3>
							<div class="post-meta">
                                <ul>
                                    <li><i class="fa fa-user"></i> <?php the_author(); ?></li>
                                    <li><i class="fa fa-clock-o"></i> <?php the_time('G:i'); ?></li>
                                    <li><i class="fa fa-calendar"></i> <?php the_date('j F Y'); ?></li>
                                </ul>
								<span>
									<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
								</span>
							</div>
							<a href="" class="attachment-archive_tumbnail size-archive_tumbnail wp-post-image">
								<?php the_post_thumbnail('archive_tumbnail');?>
							</a>
							<p><?php the_content(); ?></p>
							<div class="pager-area">
								<ul class="pager pull-right">
                                    <li><span><<?php next_post_link (' %link'); ?></span></li>
									<li><span><?php previous_post_link( '%link '); ?>></span></li>
								</ul>
							</div>
							<?php endwhile; ?>
						</div>
					</div><!--/blog-post-area-->

                    <div class="rating-area">
                        <ul class="tag">
                            <li>Категории: </li>
                            <li><?php the_category(' / ', 'multiple'); ?></li>
                        </ul>
                    </div><!--/rating-area-->

					<div class="socials-share">
						<a href=""><img src="<?php bloginfo('template_url'); ?>/assets/images/blog/socials.png" alt=""></a>
					</div><!--/socials-share-->

					<div class="media commnets">
						<a class="pull-left" href="#">
                            <?php $author_email = get_the_author_email();
                            echo get_avatar($author_email, '75');?>
						</a>
						<div class="media-body">
							<h4 class="media-heading"><?php the_author(); ?></h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							<div class="blog-socials">
								<ul>
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-twitter"></i></a></li>
									<li><a href=""><i class="fa fa-dribbble"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus"></i></a></li>
								</ul>
								<a class="btn btn-primary" href="">Other Posts</a>
							</div>
						</div>
					</div>
                <div class="response-area">
                        <?php if (comments_open()) { //Производим проверку на «открытость» комментраиев
                                if(get_comments_number() != 0){ //Если комментарии есть, делаем вывод

                                    comments_template('/comments.php');
                                    wp_list_comments(array('callback' => 'fatum_comment'));
                                }
                        } else { ?>
                            <h2>Обсуждения закрыты для данной статьи</h2>
                        <?php } ?>
                </div><!--/Response-area-->
                <div class="replay-box">
                    <div class="row">
                        <!-- Выводим форму добавления комментариев -->
                        <?php
                        $args = array(
                            'fields' =>
                                $fields = array(
                                    'author' => ' 
                                            <div class="col-sm-4">
                                            <div class="blank-arrow">
                                                 <label for="author">' . __( 'Name' ) . ($req ? '*' : '') . '</label>
                                            </div>
                                            <input type="text" id="author" name="author" class="author" value="' . esc_attr($commenter['comment_author']) . '" placeholder="" pattern="[A-Za-zА-Яа-я]{3,}" maxlength="30" autocomplete="on" tabindex="1" required' . $aria_req . '>',

                                    'email' => '
                                            <div class="blank-arrow">
                                                <label for="email">' . __( 'Email') . ($req ? '*' : '') . '</label>
                                            </div>
                                            <input type="email" id="email" name="email" class="email" value="' . esc_attr($commenter['comment_author_email']) . '" placeholder="example@example.com" maxlength="30" autocomplete="on" tabindex="2" required' . $aria_req . '>',

                                    'url' => '
                                            <div class="blank-arrow">
                                               <label for="url">' . __( 'Website' ) . ($req ? '*' : '') . '</label>
                                            </div>
                                            <input type="url" id="url" name="url" class="site" value="' . esc_attr($commenter['comment_author_url']) . '" placeholder="www.example.com" maxlength="30" tabindex="3" autocomplete="on">
                                            </div>' ),
                            'comment_notes_after' => '',
                            'comment_field' => '
                                            <div class="col-sm-8">
                                                <div class="text-area">
                                                    <label for="comment">Ваш комментаий</label> <textarea id="comment" name="comment" rows="11" aria-required="true"></textarea></p>
                                                    <p class="form-submit">
                                                        <input name="submit" type="submit" id="submit" class="btn btn-default" value="Отправить">
                                                        <input type="hidden" name="comment_post_ID" value="537" id="comment_post_ID">
                                                        <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                                                    </p>
                                                </div>
                                            </div>',
                            'label_submit' => 'Отправить',
                            'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
                            'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
                        );
                        if (get_comments_number() == 0) { ?>
                        <h2>Комментариев пока нет, но вы можете стать первым</h2>
                        <?php
                        comment_form($args);
                        } else {
                            comment_form($args);
                        } ?>
                    </div>
                </div><!--/Repaly Box-->
            </div>
        </div>
    </div>
</section>
	
<?php get_footer(); ?>