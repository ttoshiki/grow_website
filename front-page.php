<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package The7
 * @since 1.0.0
 */

// File Security Check
if (! defined('ABSPATH')) {
    exit;
}

$config = presscore_config();
$config->set('template', 'blog');
$config->set('layout', 'list');
$config->set('template.layout.type', 'list');
$config->set('post.preview.media.width', 30);

get_header();
?>

            <div class="home-wrapper">
                <section class="home-news">
                    <div class="home-newsInner">
                        <div class="home-newsHeadingWrapper">
                            <h2 class="home-newsHeading custom-font">News</h2>
                        </div>
                        <article class="home-newsArticle">
                            <ul class="home-newsList">
                                <?php
                                    $args = array(
                                        'post_type' => 'post',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'category',
                                                'field' => 'slug',
                                                'terms' => 'news',
                                                'operator' => 'IN'
                                            ),
                                        )
                                    );
                                    $the_query = new WP_Query($args); if ($the_query->have_posts()):
                                ?>
                                <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                                    <li id="post-<?php the_ID(); ?>" class="home-newsItem">
                                        <time datetime="<?php echo get_the_date('Y.m.d'); ?>" class="home-newsDate custom-font"><?php echo get_the_date('Y.m.d'); ?></time>
                                        <a href="<?php the_permalink(); ?>" class="home-newsLink"><span class="home-newsTitle"><?php echo get_the_title(); ?></span></a>
                                    </li>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                                <?php else: ?>
                                    <p>準備中です</p>
                                <?php endif; ?>
                            </ul>
                        </article>
                    </div>
                </section>
                <section class="home-about">
                    <h2 class="sectionHeading">About</h2>
                    <p class="home-leadParagraph">
                        Growは、誰でも気軽にオンラインで「投資教育」が受けられるサービスです。<br class="-pc">
                        正しい考え方と手法を身につけることで、誰でも投資で資産を形成できるようになります。
                    </p>
                    <ul class="home-aboutPointList">
                        <li class="home-aboutPointItem">
                            <span class="home-aboutPointItemNumber custom-font">Point<strong class="home-aboutPointItemStrong">1</strong></span>
                            <picture class="home-aboutPicture">
                                <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/home/point1.webp" type="image/webp">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/point1.png" alt="point1">
                            </picture>
                            <h3 class="home-aboutPointHeading">
                                初心者も安心して<br>
                                投資をスタートできる環境
                            </h3>
                            <p class="home-aboutPointParagraph">Growは、個人投資家として長年実績のあるプロが在籍。「将来のために投資をしてみたいけど、何から始めたらいいかわからない」という方でも、安心して投資を始められる環境を用意しています。</p>
                        </li>
                        <li class="home-aboutPointItem">
                            <span class="home-aboutPointItemNumber custom-font">Point<strong class="home-aboutPointItemStrong">2</strong></span>
                            <picture class="home-aboutPicture">
                                <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/home/point2.webp" type="image/webp">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/point2.png" alt="point2">
                            </picture>
                            <h3 class="home-aboutPointHeading">
                                オンライン講座が<br>
                                いつでもどこでも受け放題
                            </h3>
                            <p class="home-aboutPointParagraph">完全オンライン講座のため、時間や場所にとらわれることがありません。どんな方でも、ご自身のライフスタイルに合ったペースで、気軽に習い事感覚で「投資の学び」を深めていくことが可能です。</p>
                        </li>
                        <li class="home-aboutPointItem">
                            <span class="home-aboutPointItemNumber custom-font">Point<strong class="home-aboutPointItemStrong">3</strong></span>
                            <picture class="home-aboutPicture">
                                <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/home/point3.webp" type="image/webp">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/point3.png" alt="point3">
                            </picture>
                            <h3 class="home-aboutPointHeading">
                                個人投資家による<br>
                                個人投資家のための講座
                            </h3>
                            <p class="home-aboutPointParagraph">「NISAや投資信託はやってみたけど、いまいち利益が出なかった」そんな方でも大丈夫。国や会社に頼らずとも、自分の力で都度お金を生み出していけるよう、Grow独自のコンテンツを配信しています。</p>
                        </li>
                    </ul>
                    <div class="home-aboutButtons">
                        <a class="btn primary">会員登録はこちら</a>
                        <a class="btn secondary">ログインはこちら</a>
                    </div>
                </section>
                <section class="home-category">
                    <h2 class="sectionHeading">Category</h2>
                    <p class="home-leadParagraph">
                        まずは「Basic」から投資を学んでいきましょう。<br class="-pc">
                        「Advance」はステップアップ条件クリア後に試聴できます。<br class="-pc">
                        質問への回答や旬なトピックをお届けする「Live」もお楽しみに！
                    </p>
                    <ul class="home-categoryList">
                        <li class="home-categoryItem">
                            <div class="home-categoryHeading">
                                <span class="home-categoryLabel custom-font">Basic</span>
                                <h3 class="home-categoryItemHeading text-font">まずはじめに</h3>
                            </div>
                            <div class="home-categoryItemContents">
                                <picture class="home-categoryItemPicture">
                                    <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/home/category01.webp" type="image/webp">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/category01.png" alt="category1">
                                </picture>
                                <p class="home-categoryItemParagraph">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                            </div>
                            <div class="home-categoryItemLinkWrapper">
                                <a href="" class="home-categoryItemLink">詳しく見る</a>
                            </div>
                        </li>
                        <li class="home-categoryItem">
                            <div class="home-categoryHeading">
                                <span class="home-categoryLabel custom-font">Basic</span>
                                <h3 class="home-categoryItemHeading text-font">準備編</h3>
                            </div>
                            <div class="home-categoryItemContents">
                                <picture class="home-categoryItemPicture">
                                    <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/home/category02.webp" type="image/webp">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/category02.png" alt="category2">
                                </picture>
                                <p class="home-categoryItemParagraph">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                            </div>
                            <div class="home-categoryItemLinkWrapper">
                                <a href="" class="home-categoryItemLink">詳しく見る</a>
                            </div>
                        </li>
                        <li class="home-categoryItem">
                            <div class="home-categoryHeading">
                                <span class="home-categoryLabel custom-font">Basic</span>
                                <h3 class="home-categoryItemHeading text-font">投資の基礎</h3>
                            </div>
                            <div class="home-categoryItemContents">
                                <picture class="home-categoryItemPicture">
                                    <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/home/category03.webp" type="image/webp">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/category03.png" alt="point3">
                                </picture>
                                <p class="home-categoryItemParagraph">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                            </div>
                            <div class="home-categoryItemLinkWrapper">
                                <a href="" class="home-categoryItemLink">詳しく見る</a>
                            </div>
                        </li>
                        <li class="home-categoryItem">
                            <div class="home-categoryHeading">
                                <span class="home-categoryLabel custom-font">Advance</span>
                                <h3 class="home-categoryItemHeading text-font">投資の実践</h3>
                            </div>
                            <div class="home-categoryItemContents">
                                <picture class="home-categoryItemPicture">
                                    <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/home/category04.webp" type="image/webp">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/category04.png" alt="category4">
                                </picture>
                                <p class="home-categoryItemParagraph">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                            </div>
                            <div class="home-categoryItemLinkWrapper">
                                <a href="" class="home-categoryItemLink">詳しく見る</a>
                            </div>
                        </li>
                        <li class="home-categoryItem">
                            <div class="home-categoryHeading">
                                <span class="home-categoryLabel custom-font">Advance</span>
                                <h3 class="home-categoryItemHeading text-font">投資の応用</h3>
                            </div>
                            <div class="home-categoryItemContents">
                                <picture class="home-categoryItemPicture">
                                    <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/home/category05.webp" type="image/webp">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/category05.png" alt="category5">
                                </picture>
                                <p class="home-categoryItemParagraph">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                            </div>
                            <div class="home-categoryItemLinkWrapper">
                                <a href="" class="home-categoryItemLink">コース一覧を見る</a>
                            </div>
                        </li>
                        <li class="home-categoryItem">
                            <div class="home-categoryHeading">
                                <span class="home-categoryLabel custom-font">Live</span>
                                <h3 class="home-categoryItemHeading text-font">ライブ配信</h3>
                            </div>
                            <div class="home-categoryItemContents">
                                <picture class="home-categoryItemPicture">
                                    <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/home/category06.webp" type="image/webp">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/category06.png" alt="category6">
                                </picture>
                                <p class="home-categoryItemParagraph">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                            </div>
                            <div class="home-categoryItemLinkWrapper">
                                <a href="" class="home-categoryItemLink">詳しく見る</a>
                            </div>
                        </li>
                    </ul>
                </section>
                <section class="home-event">
                    <h2 class="sectionHeading">Event</h2>
                    <span class="sectionHeadingSub">イベント情報</span>
                    <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 4,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category',
                                    'field' => 'slug',
                                    'terms' => 'event',
                                    'operator' => 'IN'
                                ),
                            )
                         );
                        $the_query = new WP_Query($args); if ($the_query->have_posts()):
                    ?>
                    <article class="home-eventArticles">
                        <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" class="home-eventArticle" <?php post_class(); ?>>
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                        if (has_post_thumbnail()) {
                                            the_post_thumbnail();
                                        }
                                    ?>
                                    <div class="home-eventMeta">
                                        <?php
                                            $tags = get_tags();
                                            foreach( $tags as $tag) {
                                                echo '<span class="home-eventTag">'.$tag->name.'</span>';
                                            }
                                        ?>
                                        <time class="home-eventDate" datetime="<?php echo get_the_date('Y.m.d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time>
                                    </div>
                                    <span class="home-eventTitle"><?php echo get_the_title(); ?></span>
                                </a>
                            </article>
                        <?php endwhile; ?>
                    </article>
                    <?php wp_reset_postdata(); ?>
                    <?php else: ?>
                        <p>準備中です</p>
                    <?php endif; ?>
                    <div class="home-categoryBtnWrapper">
                        <a href="<?php echo home_url('/event/'); ?>" class="btn secondary custom-font home-categoryBtn">SEE MORE</a>
                    </div>
                </section>
                <section class="home-worry">
                    <h3 class="home-worryHeading text-font">
                        <picture class="home-worryIcon">
                            <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/speaker.webp" type="image/webp">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/speaker.png" alt="スピーカーアイコン">
                        </picture>
                        こんなお悩みありませんか？
                    </h3>
                    <ul class="home-worryList">
                        <li class="home-worryItem">
                            投資には難しい<br class="-pc">イメージがあるし何から<br class="-pc">始めていいかわからない
                        </li>
                        <li class="home-worryItem">
                            投資は自分とは<br class="-pc">別世界の人たちのもの<br class="-pc">と感じて踏み出せない
                        </li>
                        <li class="home-worryItem">
                            投資でお金を稼ぐには<br class="-pc">並外れた才能や知識がないと<br class="-pc">できないと思っている
                        </li>
                    </ul>
                    <div class="home-worryMessage">
                        <picture class="home-worryMessageIcon -pc">
                            <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/home/bulb.webp" type="image/webp">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/bulb.png" alt="電球アイコン">
                        </picture>
                        <p class="home-worryParagraph text-font">
                            多くの人がこのように勘違いをしていますが、<br class="-pc">私たちは、投資でお金を稼ぐことは決して<br class="-pc">難しくないと思っています。<br class="-pc">正しい考え方と手法を身につければ、<br class="-pc">誰にでも、投資で資産を形成することは可能なのです。
                        </p>
                    </div>
                    <div class="home-worryMarkWrapper">
                        <mark class="home-worryMark">オンライン講座で気軽に、<br class="-sp">投資について学びましょう！</mark>
                        <picture class="home-worryMessageIcon -sp">
                            <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/home/bulb.webp" type="image/webp">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/bulb.png" alt="電球アイコン">
                        </picture>
                    </div>
                    <div class="home-worryMessageBtn">
                        <a href="" class="btn fill">Grow会員登録はこちら</a>
                    </div>
                </section>
            </div>

			<?php do_action('presscore_after_content') ?>

<?php get_footer() ?>