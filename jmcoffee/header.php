<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover" />

    <?php wp_head(); ?>

    <?php if (!str_contains(home_url(), 'studio-jt.co.kr')): ?>
        <meta name="naver-site-verification" content="95cee40e5e0c2047cc4ae305f6c001ad249d5b23" />
    <?php endif; ?>
</head>

<body <?php body_class(); ?>>

    <header id="header">
        <div class="header__inner">
            <<?php logo_tag(); ?> id="logo">
                <a href="<?php bloginfo('url'); ?>/"><?php jt_svg('/images/layout/logo.svg'); ?></a>
            </<?php logo_tag(); ?>><!-- #logo -->

            <?php if( is_home() ) { ?>
                <ul class="sns-container">
                    <li>
                        <a href="https://www.youtube.com/channel/UCsyEkDqNdCaH29DHvLAiRHg" target="_blank" rel="noopener">
                            <i class="jt-icon"><?php jt_svg('/images/icon/jt-icon/jt-youtube-color.svg'); ?></i>
                            <span class="jt-typo--en jt-typo-en--07"><?php _e( 'Youtube', 'jt' ); ?></span>
                        </a>
                    </li>

                    <li>
                        <a href="https://www.instagram.com/jmcoffee.official/" target="_blank" rel="noopener">
                            <i class="jt-icon"><?php jt_svg('/images/icon/jt-icon/jt-instagram-color.svg'); ?></i>
                            <span class="jt-typo--en jt-typo-en--07"><?php _e( 'Instagram', 'jt' ); ?></span>
                        </a>
                    </li>

                    <li>
                        <a href="https://www.jmcoffeemall.com/" target="_blank" rel="noopener">
                            <i class="jt-icon"><?php jt_svg('/images/icon/jt-icon/jt-mall-color.svg'); ?></i>
                            <span class="jt-typo--en jt-typo-en--07"><?php _e( 'JM mall', 'jt' ); ?></span>
                        </a>
                    </li>
                </ul><!-- .sns-container -->
            <?php } ?>

            <div class="highlight-controller">
                <a href="<?php the_permalink(71); ?>" class="jt-btn__basic jt-btn--small"><span><?php _e( 'Top Brands', 'jt' ); ?></span></a>
            </div><!-- .highlight-controller -->

            <div class="language-controller">
                <a href="#" class="language-controller__btn">
                    <div class="jt-icon"><?php jt_svg('/images/icon/jt-icon/jt-language.svg'); ?></div>
                </a><!-- .language-controller__btn -->

                <ul class="language-controller__menu">
                    <li class="<?php echo ( jt_get_lang() == 'ko' ? 'language-controller--current':''); ?>"><a href="/"><span class="jt-typo--en jt-typo-en--08">Kor</span></a></li>
                    <li class="<?php echo ( jt_get_lang() == 'en' ? 'language-controller--current':''); ?>"><a href="/en"><span class="jt-typo--en jt-typo-en--08">Eng</span></a></li>
                </ul><!-- .language-controller__menu -->
            </div><!-- .language-controller -->
        </div><!-- .header__inner -->

        <div id="global-navigation">
            <div class="global-navigation-inner">
                <nav class="menu-container">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'main-menu',
                        'menu_id'        => 'menu',
                        'container'      => false,
                        'link_before'    => '<span>',
                        'link_after'     => '</span>'
                    )); ?>
                </nav><!-- .menu-container -->

                <div class="bottom-container">
                    <ul class="outlink-container">
                        <li class="outlink-sns--youtube">
                            <a href="https://www.youtube.com/channel/UCsyEkDqNdCaH29DHvLAiRHg" target="_blank" rel="noopener">
                                <i class="jt-icon"><?php jt_svg('/images/icon/jt-icon/jt-youtube.svg'); ?></i>
                                <span class="jt-typo--en jt-typo-en--07"><?php _e( 'Youtube', 'jt' ); ?></span>
                            </a>
                        </li><!-- .outlink-sns--youtube -->

                        <li class="outlink-sns--instagram">
                            <a href="https://www.instagram.com/jmcoffee.official/" target="_blank" rel="noopener">
                                <i class="jt-icon"><?php jt_svg('/images/icon/jt-icon/jt-instagram.svg'); ?></i>
                                <span class="jt-typo--en jt-typo-en--07"><?php _e( 'Instagram', 'jt' ); ?></span>
                            </a>
                        </li><!-- .outlink-sns--instagram -->
                        
                        <li class="outlink-mall">
                            <a href="https://www.jmcoffeemall.com/" target="_blank" rel="noopener">
                                <span class="jt-typo--en jt-typo-en--07"><?php _e( 'JM mall', 'jt' ); ?></span>
                                <i class="jt-icon"><?php jt_svg('/images/icon/jt-icon/jt-outlink.svg'); ?></i>
                            </a>
                        </li><!-- .outlink-mall -->
                    </ul><!-- .outlink-container -->

                    <div class="inlink-container">
                        <ul class="language-container">
                            <li class="<?php echo ( jt_get_lang() == 'ko' ? 'language-container--current':''); ?>"><a href="/"><span class="jt-typo--en jt-typo-en--07">Kor</span></a></li>
                            <li class="<?php echo ( jt_get_lang() == 'en' ? 'language-container--current':''); ?>"><a href="/en"><span class="jt-typo--en jt-typo-en--07">Eng</span></a></li>
                        </ul><!-- .language-container -->

                        <div class="privacy-container">
                            <a href="<?php the_permalink(3); ?>"><span class="jt-typo--en jt-typo-en--07"><?php _e( 'Privacy Policy', 'jt' ); ?></span></a>
                        </div><!-- .privacy-container -->
                    </div><!-- .inlink-container -->
                </div><!-- .bottom-container -->
            </div><!-- .global-navigation-inner -->
        </div><!-- #global-navigation -->
    </header>

    <a class="menu-controller" href="#global-navigation">
        <span class="menu-controller__line menu-controller__line--01"></span>
        <span class="menu-controller__line menu-controller__line--02"></span>
    </a><!-- .menu-controller -->

    <main id="main" class="main-container">
