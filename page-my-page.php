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

            <div class="myPage-wrapper">
              <div class="myPage-header">
                <h1 class="myPage-heading custom-font">About membership</h1>
                <span class="myPage-subHeading">会員登録について</span>
              </div>
              <section class="myPage-lead">
                <picture class="myPage-leadPicture">
                    <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/mypage/lead_illust.webp" type="image/webp">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/mypage/lead_illust.png" alt="">
                </picture>
                <div class="myPage-leadText">
                  <h2 class="myPage-leadHeading">個人投資家のための<br class="-sp">資産形成講座Grow</h2>
                  <p class="myPage-leadParagraph">
                    「投資をしてみたいけど、何から始めたらいいかわからない」
                    そんな方でも安心して、一歩一歩着実に投資を学べる環境がGrowです。
                  </p>
                  <p class="myPage-leadParagraph">
                    個人が投資で資産を形成する、という目的に特化したGrow独自のコンテンツが、いつでもどこでもオンラインで受け放題。
                  </p>
                  <p class="myPage-leadParagraph">
                    国や会社に頼らずとも、自分の力でお金を生み出していけるよう、一緒に学んでいきましょう。
                  </p>
                </div>
              </section>
              <section class="myPage-conversionArea">
                <div class="myPage-conversionAreaText">
                  <h2 class="myPage-conversionAreaHeading">
                    投資教育を、<br>
                    いつでもどこでも<br class="-sp">誰にでも。
                  </h2>
                  <p class="myPage-conversionAreaParagraph">
                    正しい考え方と手法を身につけることで、<br class="-pc">
                    誰でも投資で資産形成ができるようになります。
                  </p>
                </div>
                <a href="#overview" class="btn fill">Grow会員登録はこちら</a>
              </section>
              <section class="myPage-contents">
                <h2 class="sectionHeading">Contents</h2>
                <span class="sectionHeadingSub">コンテンツ紹介</span>
                <ul class="myPage-contentsList">
                  <li class="myPage-contentsItem">
                    <picture class="myPage-contentsPicture">
                      <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/mypage/contents01.webp" type="image/webp">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/mypage/contents01.png" alt="動画講座">
                    </picture>
                    <h3 class="myPage-contentsItemHeading">動画講座</h3>
                    <div class="myPage-contentsMarkerWrapper">
                      <mark class="myPage-contentsMarker">まずは投資の知識を身につける！</mark>
                    </div>
                  </li>
                  <li class="myPage-contentsItem">
                    <picture class="myPage-contentsPicture">
                      <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/mypage/contents02.webp" type="image/webp">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/mypage/contents02.png" alt="実践情報">
                    </picture>
                    <h3 class="myPage-contentsItemHeading">実践情報</h3>
                    <div class="myPage-contentsMarkerWrapper">
                      <mark class="myPage-contentsMarker">実際に投資をチャレンジする！</mark>
                    </div>
                  </li>
                  <li class="myPage-contentsItem">
                    <picture class="myPage-contentsPicture">
                      <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/mypage/contents03.webp" type="image/webp">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/mypage/contents03.png" alt="ZOOM質問会">
                    </picture>
                    <h3 class="myPage-contentsItemHeading">ZOOM質問会</h3>
                    <div class="myPage-contentsMarkerWrapper">
                      <mark class="myPage-contentsMarker">わからないところは講師に質問！</mark>
                    </div>
                  </li>
                </ul>
              </section>
              <section class="myPage-faq">
                <h2 class="sectionHeading">FAQ</h2>
                <span class="sectionHeadingSub">よくあるご質問</span>
                <ul class="myPage-faqList">
                  <li class="myPage-faqItem">
                    <div class="myPage-faqQuestionWrapper">
                      <span class="myPage-faqQuestion">銀行振り込みはできますか？</span>
                      <span class="myPage-faqIconVertical"></span>
                      <span class="myPage-faqIconHorizontal"></span>
                    </div>
                    <div class="myPage-faqAnswerWrapper">
                      <span class="myPage-faqAnswer">クレジットカード決済のみとなっております。</span>
                    </div>
                  </li>
                  <li class="myPage-faqItem">
                    <div class="myPage-faqQuestionWrapper">
                      <span class="myPage-faqQuestion">資金がどのくらいあれば投資を始められますか？</span>
                      <span class="myPage-faqIconVertical"></span>
                      <span class="myPage-faqIconHorizontal"></span>
                    </div>
                    <div class="myPage-faqAnswerWrapper">
                      <span class="myPage-faqAnswer">回答が入ります。</span>
                    </div>
                  </li>
                  <li class="myPage-faqItem">
                    <div class="myPage-faqQuestionWrapper">
                      <span class="myPage-faqQuestion">途中解約した場合どうなりますか？</span>
                      <span class="myPage-faqIconVertical"></span>
                      <span class="myPage-faqIconHorizontal"></span>
                    </div>
                    <div class="myPage-faqAnswerWrapper">
                      <span class="myPage-faqAnswer">回答が入ります。</span>
                    </div>
                  </li>
                  <li class="myPage-faqItem">
                    <div class="myPage-faqQuestionWrapper">
                      <span class="myPage-faqQuestion">投資は初心者ですが登録できますか？</span>
                      <span class="myPage-faqIconVertical"></span>
                      <span class="myPage-faqIconHorizontal"></span>
                    </div>
                    <div class="myPage-faqAnswerWrapper">
                      <span class="myPage-faqAnswer">回答が入ります。</span>
                    </div>
                  </li>
                </ul>
              </section>
              <section class="myPage-overview" id="overview">
                <h2 class="sectionHeading">Over view</h2>
                <span class="sectionHeadingSub">Growについて</span>
                <dl class="myPage-overviewGraph">
                  <dt>内　容</dt>
                  <dd>
                    <ul class="myPage-overviewContentsList">
                      <li class="myPage-overviewContentsItem">内容テキストが入ります。内容テキストが入ります。内容テキストが入ります。</li>
                      <li class="myPage-overviewContentsItem">内容テキストが入ります。内容テキストが入ります。内容テキストが入ります。</li>
                      <li class="myPage-overviewContentsItem">内容テキストが入ります。内容テキストが入ります。内容テキストが入ります。</li>
                      <li class="myPage-overviewContentsItem">内容テキストが入ります。内容テキストが入ります。内容テキストが入ります。</li>
                    </ul>
                  </dd>
                  <dt>料　金</dt>
                  <dd>00000円（税込）</dd>
                  <dt>お支払方法</dt>
                  <dd>ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト</dd>
                  <dt>注意事項</dt>
                  <dd>
                    ダミーテキストダミーテキストダミーテキストダミーテキスト<br>
                    ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト<br>
                    ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト<br>
                    ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト
                  </dd>
                </dl>
                <div class="myPage-terms">
                  <h3 class="myPage-termsHeading">利用規約</h3>
                  <p class="myPage-termsParagpraph">
                    ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト<br>
                    ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト<br>
                    ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト<br>
                    ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト<br>
                    ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト<br>
                    ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト<br>
                    ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト
                  </p>
                </div>
                <div class="myPage-termsButton">
                  <?php echo do_shortcode('[add_to_cart id="8179"]'); ?>
                  <!-- <a href="<?php echo home_url('/my-page/') ?>" class="btn primary">会員登録はこちら</a> -->
                </div>
              </section>
            </div>

			<?php do_action('presscore_after_content') ?>

<?php get_footer() ?>