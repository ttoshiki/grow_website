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

            <div class="home">
                <section class="home-news">
                    <div class="home-news-inner">
                        <h2 class="sectionHeading">News</h2>
                        <?php if (have_posts()): ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <a href="<?php the_permalink(); ?>">
                                    <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class=""><?php echo get_the_date('Y-m-d'); ?></time>
                                    <?php echo get_the_title(); ?>
                                </a>
                                </article>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <p>準備中です</p>
                        <?php endif; ?>
                    </div>
                </section>
                <section class="home-about">
                    <p class="home-lead-paragraph">
                        Growは、誰でも気軽にオンラインで「投資教育」が受けられるサービスです。<br>
                        正しい考え方と手法を身につけることで、誰でも投資で資産を形成できるようになります。
                    </p>
                    <ul class="home-about-pointList">
                        <li class="home-about-pointItem">
                            <span class="home-about-pointItemNumber">Point<strong class="home-about-pointItemStrong">1</strong></span>
                            <picture class="catch__mainVisualPicture">
                                <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/home/point1.webp" type="image/webp">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/point1.png" alt="point1">
                            </picture>
                            <h3 class="home-about-pointHeading">
                                初心者も安心して<br>
                                投資をスタートできる環境
                            </h3>
                            <p class="home-about-pointParagraph">Growは、個人投資家として長年実績のあるプロが在籍。「将来のために投資をしてみたいけど、何から始めたらいいかわからない」という方でも、安心して投資を始められる環境を用意しています。</p>
                        </li>
                        <li class="home-about-pointItem">
                            <span class="home-about-pointItemNumber">Point<strong class="home-about-pointItemStrong">2</strong></span>
                            <picture class="catch__mainVisualPicture">
                                <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/home/point2.webp" type="image/webp">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/point2.png" alt="point2">
                            </picture>
                            <h3 class="home-about-pointHeading">
                                オンライン講座が<br>
                                いつでもどこでも受け放題
                            </h3>
                            <p class="home-about-pointParagraph">完全オンライン講座のため、時間や場所にとらわれることがありません。どんな方でも、ご自身のライフスタイルに合ったペースで、気軽に習い事感覚で「投資の学び」を深めていくことが可能です。</p>
                        </li>
                        <li class="home-about-pointItem">
                            <span class="home-about-pointItemNumber">Point<strong class="home-about-pointItemStrong">3</strong></span>
                            <picture class="catch__mainVisualPicture">
                                <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/home/point3.webp" type="image/webp">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/point3.png" alt="point3">
                            </picture>
                            <h3 class="home-about-pointHeading">
                                個人投資家による<br>
                                個人投資家のための講座
                            </h3>
                            <p class="home-about-pointParagraph">「NISAや投資信託はやってみたけど、いまいち利益が出なかった」そんな方でも大丈夫。国や会社に頼らずとも、自分の力で都度お金を生み出していけるよう、Grow独自のコンテンツを配信しています。</p>
                        </li>
                    </ul>
                    <div class="home-about-buttons">
                        <a class="btn primary">会員登録はこちら</a>
                        <a class="btn secondary">ログインはこちら</a>
                    </div>
                </section>
                <section class="home-category">
                    <h2 class="sectionHeading">Category</h2>
                    <p class="home-lead-paragraph">
                        まずは「Basic」から投資を学んでいきましょう。<br>
                        「Advance」はステップアップ条件クリア後に試聴できます。<br>
                        質問への回答や旬なトピックをお届けする「Live」もお楽しみに！
                    </p>
                    <ul class="home-category-list">
                        <li class="home-category-item">
                            <div class="home-category-Heading">
                                <span class="home-category-label">Basic</span>
                                <h3 class="home-category-itemHeading">まずはじめに</h3>
                            </div>
                            <div class="home-category-itemContents">
                                <picture class="home-category-itemPicture">
                                    <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/home/category01.webp" type="image/webp">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/category01.png" alt="category1">
                                </picture>
                                <p class="home-category-itemParagraph">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                            </div>
                            <a href="" class="home-category-itemLink">詳しく見る</a>
                        </li>
                        <li class="home-category-item">
                            <div class="home-category-Heading">
                                <span class="home-category-label">Basic</span>
                                <h3 class="home-category-itemHeading">準備編</h3>
                            </div>
                            <div class="home-category-itemContents">
                                <picture class="home-category-itemPicture">
                                    <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/home/category02.webp" type="image/webp">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/category02.png" alt="category2">
                                </picture>
                                <p class="home-category-itemParagraph">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                            </div>
                            <a href="" class="home-category-itemLink">詳しく見る</a>
                        </li>
                        <li class="home-category-item">
                            <div class="home-category-Heading">
                                <span class="home-category-label">Basic</span>
                                <h3 class="home-category-itemHeading">投資の基礎</h3>
                            </div>
                            <div class="home-category-itemContents">
                                <picture class="home-category-itemPicture">
                                    <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/home/category03.webp" type="image/webp">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/category03.png" alt="point3">
                                </picture>
                                <p class="home-category-itemParagraph">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                            </div>
                            <a href="" class="home-category-itemLink">詳しく見る</a>
                        </li>
                        <li class="home-category-item">
                            <div class="home-category-Heading">
                                <span class="home-category-label">Advance</span>
                                <h3 class="home-category-itemHeading">投資の実践</h3>
                            </div>
                            <div class="home-category-itemContents">
                                <picture class="home-category-itemPicture">
                                    <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/home/category04.webp" type="image/webp">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/category04.png" alt="category4">
                                </picture>
                                <p class="home-category-itemParagraph">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                            </div>
                            <a href="" class="home-category-itemLink">詳しく見る</a>
                        </li>
                        <li class="home-category-item">
                            <div class="home-category-Heading">
                                <span class="home-category-label">Advance</span>
                                <h3 class="home-category-itemHeading">投資の応用</h3>
                            </div>
                            <div class="home-category-itemContents">
                                <picture class="home-category-itemPicture">
                                    <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/home/category05.webp" type="image/webp">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/category05.png" alt="category5">
                                </picture>
                                <p class="home-category-itemParagraph">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                            </div>
                            <a href="" class="home-category-itemLink">コース一覧を見る</a>
                        </li>
                        <li class="home-category-item">
                            <div class="home-category-Heading">
                                <span class="home-category-label">Live</span>
                                <h3 class="home-category-itemHeading">ライブ配信</h3>
                            </div>
                            <div class="home-category-itemContents">
                                <picture class="home-category-itemPicture">
                                    <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/home/category06.webp" type="image/webp">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/category06.png" alt="category6">
                                </picture>
                                <p class="home-category-itemParagraph">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                            </div>
                            <a href="" class="home-category-itemLink">詳しく見る</a>
                        </li>
                    </ul>
                </section>
                <section class="home-event">
                    <h2 class="sectionHeading">Event</h2>
                    <span class="sectionHeadingSub">イベント情報</span>
                    <?php
                        $args = array(
                            'post_type' => 'event',
                            'posts_per_page' => 4
                         );
                        $the_query = new WP_Query($args); if ($the_query->have_posts()):
                    ?>
                    <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" class="home-eventArticle" <?php post_class(); ?>>
                            <a href="<?php the_permalink(); ?>">
                                <div class="home-eventMeta">
                                    <?php
                                        $terms = get_the_terms($post->ID, 'tag_event');
                                        foreach ($terms as $term) {
                                            echo '<span class="home-eventTag">'.$term->name.'</span>';
                                        }
                                    ?>
                                    <time class="home-eventDate" datetime="<?php echo get_the_date('Y.m.d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time>
                                </div>
                                <?php echo get_the_title(); ?>
                            </a>
                        </article>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php else: ?>
                        <p>準備中です</p>
                    <?php endif; ?>
                    <a href="<?php echo home_url('/event/'); ?>" class="btn secondary custom-font">SEE MORE</a>
                </section>
                <section class="home-worry">
                    <h3 class="home-worryHeading">
                        <picture class="home-worry-icon">
                            <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/home/speaker.webp" type="image/webp">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/speaker.png" alt="スピーカーアイコン">
                        </picture>
                        こんなお悩みありませんか？
                    </h3>
                    <ul class="home-worryList">
                        <li class="home-worryItem">
                            投資には難しい<br>
                            イメージがあるし何から<br>
                            始めていいかわからない
                        </li>
                        <li class="home-worryItem">
                            投資は自分とは<br>
                            別世界の人たちのもの<br>
                            と感じて踏み出せない
                        </li>
                        <li class="home-worryItem">
                            投資でお金を稼ぐには<br>
                            並外れた才能や知識がないと<br>
                            できないと思っている
                        </li>
                    </ul>
                    <div class="home-worryMessage">
                        <picture class="home-worryMessageIcon">
                            <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/home/bulb.webp" type="image/webp">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/bulb.png" alt="電球アイコン">
                        </picture>
                        <p class="home-worryParagraph">
                            多くの人がこのように勘違いをしていますが、<br>
                            私たちは、投資でお金を稼ぐことは決して<br>
                            難しくないと思っています。<br>
                            正しい考え方と手法を身につければ、<br>
                            誰にでも、投資で資産を形成することは可能なのです。
                        </p>
                    </div>
                    <mark class="home-worryMark">オンライン講座で気軽に、投資について学びましょう！</mark>
                    <a href="btn primary fill">Grow会員登録はこちら</a>
                </section>
            </div>

			<?php do_action('presscore_after_content') ?>

<?php get_footer() ?>