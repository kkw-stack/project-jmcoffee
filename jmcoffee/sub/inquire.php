<?php
/**
 * Template Name: 문의하기
 */

defined('ABSPATH') || die(http_response_code(404));
?>

<?php get_header(); ?>

<?php if(have_posts()) : ?>
	<?php while( have_posts()) : the_post(); ?>
        <?php
        $service = JT_Inquiry_Service::instance();
        $inquiry_type = $service->get_type_options();
        ?>
        <div class="article">
			<div class="article__header">
				<div class="wrap">
					<h1 class="article__title jt-typo--en jt-typo-en--01 jt-motion--split">Contact us</h1>
				</div><!-- .wrap -->
			</div><!-- .article__header -->

			<div class="article__body">
				<div class="wrap-middle jt-motion--up" data-motion-delay="0.4">
					<div class="inquire-container">
						<div class="inquire-info">
                            <div class="inquire-info__inner">
                                <h2 class="inquire-info__title jt-typo--04"><?php _e('새로운 커피문화를 주도하고, <br />현재 진행중인 사업(현재)과 앞으로 확장할 <br />사업(미래)을 균형있게 발전시킵니다.', 'jt' ); ?></h2>
    
                                <ul class="inquire-info__list">
                                    <li>
                                        <b class="jt-typo--en jt-typo-en--06"><?php _e('Mail to us', 'jt' ); ?></b>
                                        <p class="jt-typo--07"><a href="mailto:<?php echo antispambot('jmcoffeecs@jmcoffee.co.kr'); ?>"><?php echo antispambot('jmcoffeecs@jmcoffee.co.kr'); ?></a></p>
                                    </li>
                                    <li>
                                        <b class="jt-typo--en jt-typo-en--06"><?php _e('Call us', 'jt' ); ?></b>
                                        <p class="jt-typo--07"><a href="tel: 1899-0820"><?php _e('1899-0820', 'jt' ); ?></a></p>
                                    </li>
                                    <li>
                                        <b class="jt-typo--en jt-typo-en--06"><?php _e('Hours', 'jt' ); ?></b>
                                        <p class="jt-typo--07">
                                            <?php _e('<span>월요일-금요일</span> 10:00-17:00 <br /><span>토요일, 일요일, 공휴일</span> OFF', 'jt' ); ?>
                                        </p>
                                    </li>
                                </ul>
                            </div><!-- .inquire-info__inner -->
						</div><!-- .inquire-info -->

						<div class="inquire-form">
                            <form class="jt-form" novalidate data-ajax="<?php echo admin_url('admin-ajax.php'); ?>">
                                <input type="hidden" name="action" value="jm_inquiry" />

                                <div class="jt-form__fieldset">
                                    <div class="jt-form__entry jt-form--required">
                                        <label class="jt-form__label" for="inquire-name"><span class="jt-typo--06"><?php _e('이름', 'jt' ); ?></span></label>

                                        <div class="jt-form__data">
                                            <input type="text" name="name" class="jt-form__field jt-form__field--valid" id="inquire-name" required placeholder="<?php _e('이름을 입력해 주세요.', 'jt' ); ?>" />
                                            <span class="jt-form__valid jt-typo--08"></span>
                                        </div><!-- .jt-form__data -->
                                    </div><!-- .jt-form__entry -->

                                    <div class="jt-form__entry jt-form--required">
                                        <label class="jt-form__label" for="inquire-email"><span class="jt-typo--06"><?php _e('이메일', 'jt' ); ?></span></label>

                                        <div class="jt-form__data">
                                            <input type="email" name="email" class="jt-form__field jt-form__field--valid" id="inquire-email" required placeholder="<?php _e('이메일을 입력해 주세요.', 'jt' ); ?>" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" data-msg-invalid="<?php _e('정확한 형식의 이메일을 기재해 주세요.', 'jt' ); ?>" />
                                            <span class="jt-form__valid jt-typo--08"></span>
                                        </div><!-- .jt-form__data -->
                                    </div><!-- .jt-form__entry -->

                                    <div class="jt-form__entry jt-form--required">
                                        <label class="jt-form__label" for="inquire-tel"><span class="jt-typo--06"><?php _e('전화번호', 'jt' ); ?></span></label>

                                        <div class="jt-form__data">
                                            <input type="tel" name="phone" class="jt-form__field jt-form__field--valid" id="inquire-tel" required placeholder="<?php _e('전화번호를 입력해 주세요.', 'jt' ); ?>" pattern="^(?:\d-?){6,15}$" data-msg-invalid="<?php _e('정확한 형식의 전화번호를 기재해 주세요.', 'jt' ); ?>" />
                                            <span class="jt-form__valid jt-typo--08"></span>
                                        </div><!-- .jt-form__data -->
                                    </div><!-- .jt-form__entry -->

                                    <div class="jt-form__entry">
                                        <label class="jt-form__label" for="inquire-company"><span class="jt-typo--06"><?php _e('지역/회사명', 'jt' ); ?></span></label>

                                        <div class="jt-form__data">
                                            <input type="text" name="company" class="jt-form__field" id="inquire-company" placeholder="<?php _e('지역과 회사명을 입력해 주세요.', 'jt' ); ?>" />
                                        </div><!-- .jt-form__data -->
                                    </div><!-- .jt-form__entry -->

                                    <div class="jt-form__entry jt-form--required">
                                        <label class="jt-form__label" for="inquire-message"><span class="jt-typo--06"><?php _e('내용', 'jt' ); ?></span></label>

                                        <div class="jt-form__data">
                                            <div class="jt-form__data-inner">
                                                <textarea name="content" class="jt-form__field jt-form__field--valid" id="inquire-message" required placeholder="<?php _e('내용을 입력해 주세요.', 'jt' ); ?>"></textarea>
                                            </div><!-- .jt-form__data-inner -->
                                            <span class="jt-form__valid jt-typo--08"></span>
                                        </div><!-- .jt-form__data -->
                                    </div><!-- .jt-form__entry -->

                                    <div class="jt-form__entry">
                                        <p class="jt-form__label"><span class="jt-typo--06"><?php _e('문의유형', 'jt' ); ?></span></p>

                                        <div class="jt-form__data">
                                            <div class="jt-radiobox jt-radiobox--vertical">

                                                <?php if ( ! empty( $inquiry_type ) ) : ?>
                                                    <?php foreach ( $inquiry_type as $key => $item ) : ?>
                                                        <label><input type="radio" name="type" value="<?php echo $item['type']; ?>" <?php checked($key === 0); ?>><span><?php echo $item['type']; ?></span></label>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div><!-- .jt-radiobox -->
                                        </div><!-- .jt-form__data -->
                                    </div>
                                </div><!-- .jt-form__fieldset -->

                                <div class="jt-agreement">
                                    <b class="jt-agreement__title jt-typo--06"><?php _e('개인정보 수집 및 이용에 대한 안내', 'jt' ); ?></b>

                                    <div class="jt-agreement__content">
                                        <div class="jt-agreement__content-inner">
                                            <div class="jt-agreement__item">
                                                <b class="jt-typo--08"><?php _e('개인정보의 수집 및 이용목적', 'jt' ); ?></b>
                                                <p class="jt-typo--08"><?php _e('당사는 고객 문의사항에 대한 답변을 드리기 위한 목적으로 귀하의 개인정보를 수집·이용합니다.', 'jt' ); ?></p>
                                            </div><!-- .jt-agreement__item -->

                                            <div class="jt-agreement__item">
                                                <b class="jt-typo--08"><?php _e('수집하는 개인정보의 항목', 'jt' ); ?></b>
                                                <p class="jt-typo--08"><?php _e('이름, 이메일주소, 전화번호, 회사명, 내용', 'jt' ); ?></p>
                                            </div><!-- .jt-agreement__item -->

                                            <div class="jt-agreement__item">
                                                <b class="jt-typo--08"><?php _e('수집한 개인정보의 보유 및 이용기간', 'jt' ); ?></b>
                                                <p class="jt-typo--08"><?php _e('당사는 개인정보 수집 및 이용에 관한 동의 후 3년간 보유하고 이후 해당 정보를 지체없이 파기합니다. <br />단, 관계법령의 규정에 의하여 보존할 필요가 있는 경우 회사는 관계법령이 정한 일정한 기간동안 개인정보를 보관합니다.', 'jt' ); ?></p>
                                            </div><!-- .jt-agreement__item -->
                                        </div><!-- .jt-agreement__content-inner -->
                                    </div><!-- .jt-agreement__content -->

                                    <div class="jt-agreement__choice">
                                        <div class="jt-agreement__choice-field">
                                            <div class="jt-checkbox">
                                                <label><input type="checkbox" name="agree" required /><span><?php _e('동의합니다.', 'jt' ); ?></span></label>
                                            </div><!-- .jt-checkbox -->
                                            <span class="jt-form__valid jt-typo--08"></span>
                                        </div><!-- .jt-agreement__choice-field -->
                                    </div><!-- .jt-agreement__choice -->
                                </div><!-- .jt-agreement -->

                                <div class="jt-form__control">
                                    <input type="submit" class="jt-form__action" value="<?php _e('문의하기', 'jt' ); ?>" />
                                </div><!-- .jt-form__control -->
                            </form><!-- .jt-form -->
						</div><!-- .inquire-form -->
					</div><!-- .inquire-container -->
				</div><!-- .wrap-middle -->
			</div><!-- .article__body -->
		</div><!-- .article -->
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>