<?php
/**
 * DokuWiki Starter Bootstrap Template
 *
 * @link     http://dokuwiki.org/template:starterbootstrap
 * @author   Cameron Littel <cameron@camlittle.com>
 */

if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */
@require_once(dirname(__FILE__).'/tpl_functions.php'); /* include hook for template functions */
@require_once(dirname(__FILE__).'/navbar.php'); /* include hook for navbar functions */

$showTools = !tpl_getConf('hideTools') || ( tpl_getConf('hideTools') && $_SERVER['REMOTE_USER'] );
$showSidebar = (page_findnearest($conf['sidebar']) || $conf['sidebar'] == "automatic") && ($ACT=='show');
$sidebarCols = (int) tpl_getConf('sidebar_cols');
$sidebarPos = tpl_getConf('sidebar_pos');
if ($sidebarCols < 0 || $sidebarCols >= 12) {
	$sidebarCols = 3;
}

?><!DOCTYPE html>
<html xml:lang="<?php echo $conf['lang'] ?>" lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>" class="no-js">
<head>
    <script src="https://unpkg.com/vue"></script>
    <meta charset="UTF-8" />
    <meta name="referrer" content="always" />

    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><![endif]-->
    <title>
        <?php tpl_pagetitle() ?>
        [<?php echo strip_tags($conf['title'])?>]
    </title>
    
    <script src="https://use.typekit.net/cts6oju.js"></script>
    <script>try{Typekit.load({ async: false });}catch(e){}</script>
    
    <?php @require_once(dirname(__FILE__).'/head-css.php'); ?>
<?php
$brandImg = tpl_getConf('header_img');
if ($brandImg == '') {
    $brandImg = $DOKU_INC . 'brand.png';
    if (!file_exists($brandImg)) $brandImg = $DOKU_INC . 'brand.jpg';
    if (!file_exists($brandImg)) $brandImg = '';
}
if ($brandImg != ''):
    $brandImgHeight = tpl_getConf('header_height');
    if ($brandImgHeight && ctype_digit($brandImgHeight)) $brandImgHeight .= 'px';
    if ($brandImgHeight == '') $brandImgHeight = 'auto';
    $brandImgMargin = tpl_getConf('header_padding');
    if ($brandImgMargin == '') {
        $brandImgMargin = '8';
    }
    if (ctype_digit($brandImgMargin)) $brandImgMargin .= 'px';
?>
    <style>
        .navbar-brand-img {
            box-sizing: content-box;
            padding-top: <?php echo $brandImgMargin; ?>;
            padding-bottom: <?php echo $brandImgMargin; ?>;
            <?php if ($brandImgHeight) { echo 'height: ', $brandImgHeight, ';\n'; } ?>
        }
    </style>
<?php endif; ?>

<!-- Cookie Policy Notification -->
<link rel="stylesheet" type="text/css" href="https://s3-us-west-2.amazonaws.com/digilent/resources/cdn/cookieconsent.min.css"/>
<script src="https://s3-us-west-2.amazonaws.com/digilent/resources/cdn/cookieconsent.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/digilent/resources/cdn/digilent-cookie-consent.js"></script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NHG3J9R');</script>
<!-- End Google Tag Manager -->

</head>

<body data-spy="scroll" data-target="#dw_toc">
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NHG3J9R"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

    <?php /* with these Conditional Comments you can better address IE issues in CSS files,
             precede CSS rules by #IE6 for IE6, #IE7 for IE7 and #IE8 for IE8 (div closes at the bottom) */ ?>
    <!--[if IE 6 ]><div id="IE6"><![endif]--><!--[if IE 7 ]><div id="IE7"><![endif]--><!--[if IE 8 ]><div id="IE8"><![endif]-->

    <?php /* the "dokuwiki__top" id is needed somewhere at the top, because that's where the "back to top" button/link links to */ ?>
    <?php /* classes mode_<action> are added to make it possible to e.g. style a page differently if it's in edit mode,
         see http://www.dokuwiki.org/devel:action_modes for a list of action modes */ ?>
    <?php /* .dokuwiki should always be in one of the surrounding elements (e.g. plugins and templates depend on it) */ ?>
    <div id="dokuwiki__site" >
	
	<div id="dokuwiki__top" class="dokuwiki site mode_<?php echo $ACT ?> <?php echo ($showSidebar) ? 'hasSidebar' : '' ?>">
        
		<!-------------------------------------Start  OF HEADER------------------------------------->	
		<div class="navbar navbar-default navbar-fixed-top container-fluid" id="navbar">
            <div class="container">
            <?php tpl_includeFile('header.html') ?>
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target="#topnav" type="button">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php if ($brandImg != '') { ?>
                    <a class="navbar-brand-img navbar-brand" href="/"><img src="<?php echo $brandImg; ?>" alt="<?php $conf['title'] ?>"></a>
                <?php } ?>
                <?php if ($brandImg == '' || tpl_getConf('header_title')) {
                tpl_link(wl(),$conf['title'],'accesskey="h" title="[H]" class="navbar-brand"');
                } ?>		
            </div>
			
            <div class="navbar-collapse collapse" id="topnav">				
				<!---------------Generate Navbar--------------->					
					<div class="standard-nav nav nav-bar">
						<a href ="http://store.digilentinc.com/">Store</a>
						<a href ="http://blog.digilentinc.com/">Blog</a>
						<a href ="http://forum.digilentinc.com/">Forum</a>
                        <a href="http://projects.digilentinc.com/">Projects</a>
                        <a href ="https://reference.digilentinc.com/">Documentation</a>
					</div>
					
					<!------------------------------------------------------------------------------------------				
					- START WIKI NAV
					---------------------------------------------	--------------------------------------------->
					<?php
						echo getNavBar();
					?>
					<!------------------------------------------------------------------------------------------				
					- END WIKI NAV
					---------------------------------------------	--------------------------------------------->
												
					<!---------------Tools ---------------> 
					<ul class="nav navbar-nav navbar-right">
						<?php if ($showTools): ?>
							<?php tpl_action('edit', 1, 'li'); ?>
						<?php endif; ?> 
						<li class="dropdown">
							<a href="#" class="dropdown-toggle toolsdrop" data-toggle="dropdown"><?php echo $lang['tools']; ?> <b class="caret"></b></a>
							<ul class="dropdown-menu hortop">
								<li class="dropdown-header"><?php echo $lang['page_tools'] ?></li>
								<?php
									tpl_action('edit', 1, 'li');
									if ($ACT == 'revisions') { tpl_action('revisions', 1, 'li class="active"'); } else { tpl_action('revisions', 1, 'li'); };
									if ($ACT == 'backlink') { tpl_action('backlink', 1, 'li class="active"'); } else { tpl_action('backlink', 1, 'li'); };
									tpl_action('subscribe', 1, 'li');
									tpl_action('revert', 1, 'li');
								?>
								<li class="dropdown-header"><?php echo $lang['site_tools'] ?></li>
								<?php if ($showTools): ?>
								<?php
									if ($ACT == 'recent') { tpl_action('recent', 1, 'li class="active"'); } else { tpl_action('recent', 1, 'li'); };
									if ($ACT == 'index') { tpl_action('index', 1, 'li class="active"'); } else { tpl_action('index', 1, 'li'); };
									if ($ACT == 'media') { tpl_action('media', 1, 'li class="active"'); } else { tpl_action('media', 1, 'li'); };
									if ($ACT == 'admin') { tpl_action('admin', 1, 'li class="active"'); } else { tpl_action('admin', 1, 'li'); };
								?>
								<?php endif ?>
								<?php if ($conf['useacl'] && $showTools): ?>
								<li class="dropdown-header"><?php echo $lang['user_tools'] ?></li>
								<?php
									if ($ACT == 'profile') { tpl_action('profile', 1, 'li class="active"'); } else { tpl_action('profile', 1, 'li'); };
									if ($ACT == 'login') { tpl_action('login', 1, 'li class="active"'); } else { tpl_action('login', 1, 'li'); };
								?>
								<?php endif; ?>
								<li class="divider"></li>
								<?php /* the optional second parameter of tpl_action() switches between a link and a button,
								 e.g. a button inside a <li> would be: tpl_action('edit', 0, 'li') */
									tpl_action('top', 1, 'li');
								?>
							</ul>
						</li>
					</ul>
				<!---------------Search--------------->
				<?php _tpl_searchform() ?>

		</div>
	</div>	
    </div>
	<!-------------------------------------END OF HEADER------------------------------------->
        <div class="container<?php if ((int) tpl_getConf('full_width') === 1) { echo "-fluid"; } ?> not-header">
            <div class="notifications hidden-print">
                <?php html_msgarea() /* occasional error and info messages on top of the page */ ?>
            </div>
			
			<!--Removed By Kristoff
				<a href="#dokuwiki__content" class="sr-only hidden-print"><//?php echo $lang['skip_to_content']; ?></a>
				<a href="#dokuwiki__aside" class="skip-to-sidebar hidden-print visible-xs btn-block btn btn-info"><//?php echo "Skip to Navigation"; // echo $lang['skip_to_nav']; ?></a>
			-->
            <?php if($conf['breadcrumbs']) _tpl_breadcrumbs(); ?>
            
            <?php if($conf['youarehere']){ ?>
				<div class="youarehere">
					<?php bootstrap_tpl_youarehere() ?>
				</div>
			<?php } ?>

            <?php
                $sidebar_contents = "";
                if ($conf['sidebar'] == 'automatic') {
                    $sidebar_contents = "automatic";
                } else {
                    $sidebar_contents = bootstrap_tpl_get_sidebar($conf['sidebar'], false);
                }
            ?>

            <section class="wrapper row"><!-- PAGE ACTIONS -->
                <!-- ********** CONTENT ********** -->
                <div id="dokuwiki__content" class="<?php
                    if ($ACT == 'show' && $sidebar_contents != ""):
                        ?>col-sm-<?php echo 12 - $sidebarCols; ?><?php
                        if ($sidebarPos == "Left"):
                            ?> col-sm-push-<?php echo $sidebarCols; ?> <?php
                        endif; ?><?php
                    else: ?>col-xs-12<?php
                    endif; ?>">
                    
                    <?php tpl_flush() /* flush the output buffer */ ?>
                    <?php tpl_includeFile('pageheader.html') ?>

                    <?php _tpl_toc(); ?>
                    <div class="page row" role="main">
                    <!-- wikipage start -->
                        <?php
                        if ($ID == "starterbootstrap:index" && auth_quickaclcheck($id) > AUTH_CREATE) {
                            include_once("generate_index.php");
                        } else {
                            tpl_content(false); /* the main content */
                        }
                        ?>
                    <!-- wikipage stop -->
                    </div>

                    <?php tpl_includeFile('pagefooter.html') ?>
					
					
                </div><!-- /content -->

                <!-- ********** ASIDE ********** -->
                <?php if ($ACT == 'show'): ?>
                <aside id="dokuwiki__aside" class="col-sm-<?php echo $sidebarCols; ?><?php
                    if ($sidebarPos == "Left"):
                        ?> col-sm-pull-<?php echo 12 - $sidebarCols; ?><?php
                    endif; ?>">
                    <?php if ($showSidebar && $sidebarCols > 0): ?>
                    <div class="sidebar-page">
                        <?php
                            tpl_includeFile('sidebarheader.html');
                            if ($conf['sidebar'] == "automatic") {
                                include_once("generate_index.php");
                            } else {
                                echo $sidebar_contents;
                            }
                            tpl_includeFile('sidebarfooter.html');
                        ?>
                    </div>
                    <?php endif; ?>
                </aside><!-- /aside -->
                <?php endif; ?>
            </section><!-- /wrapper -->

            <!-- ********** FOOTER ********** -->            
			
    </div></div><!-- /site -->
	<div class="container-fluid footer">
	<div class="container">
        <div class="row">
            <!-- <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                <div class="mailchimp-newsletter">
                    <h3 class="text-center">Subscribe to our Newsletter</h3>
                    <div id="mc_embed_signup">
                    <form action="//digilentinc.us8.list-manage.com/subscribe/post?u=cf6d73f14b5a712de344b738a&amp;id=7953e871f4" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form-inline" target="_blank" novalidate>
                        <div id="mc_embed_signup_scroll row">
                            <div class="mc-field-group form-group">
                                <input type="text" value="" name="FNAME" class="form-control" id="mce-FNAME" placeholder="First Name">
                            </div>
                            <div class="mc-field-group form-group">
                                <input type="text" value="" name="LNAME" class="form-control" id="mce-LNAME" placeholder="Last Name">
                            </div>
                            <div class="mc-field-group form-group">
                                <input type="email" value="" name="EMAIL" class="required email form-control" id="mce-EMAIL" placeholder="Email Address">
                            </div>

                            <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                <input type="text" name="b_cf6d73f14b5a712de344b738a_7953e871f4" tabindex="-1" value="">
                            </div>
                            <input type="submit" value="Submit" name="subscribe" id="mc-embedded-subscribe" class="btn form-control">
                        </div>
                    </form>
                    </div> 
                </div>
            </div> -->
        </div>
		<div class="row footer-links">
            <div class="col-xs-3 col-sm-2">
                <h4>Our Partners</h4>
                <ul class="no-bullet">
                    <li><a href="https://store.digilentinc.com/partners/xilinx-university-program/">Xilinx
                            University
                            Program</a></li>
                    <li><a href="https://store.digilentinc.com/technology-partners/">Technology Partners</a>
                    </li>
                    <li><a href="https://store.digilentinc.com/our-distributors/">Distributors</a></li>
                </ul>
            </div>
            <div class="col-xs-3 col-sm-2">
                <h4>Help</h4>
                <ul class="no-bullet">
                    <li><a href="https://forum.digilentinc.com">Technical Support Forum</a></li>
                    <li><a href="https://reference.digilentinc.com">Reference Wiki</a></li>
                    <li><a href="https://store.digilentinc.com/contact-us/">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-xs-3 col-sm-2">
                <h4>Customer Info</h4>
                <ul class="no-bullet">
                    <li><a href="https://youtube.com/user/digilentinc">Videos</a></li>
                    <li><a href="https://resource.digilentinc.com/verify/faq">FAQ</a></li>
                    <li><a href="https://store.digilentinc.com/store-info/">Store Info</a></li>
                </ul>
            </div>

            <div class="col-xs-3 col-sm-2">
                <h4>Company Info</h4>
                <ul class="no-bullet">
                    <li><a href="https://store.digilentinc.com/pages.php?pageid=26">About Us</a></li>
                    <li><a href="https://store.digilentinc.com/shipping-returns/">Shipping & Returns</a></li>
                    <li><a href="https://store.digilentinc.com/legal/">Legal</a></li>
                    <li><a href="https://store.digilentinc.com/jobs/">Jobs</a></li>
                    <li><a href="https://store.digilentinc.com/internships/">Internships</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 social">
                <h4>Connect With Us</h4>
                    <ul class="inline-list social-footer">
                        <li><a href="https://twitter.com/digilentinc"><img data-type="twitter" data-src="<?php print DOKU_TPL; ?>Iconic/svg/smart/social.svg" class="iconic twitter" alt="social"/></a></li>
                        <li><a href="https://www.facebook.com/Digilent"><img data-type="facebook" data-src="<?php print DOKU_TPL; ?>Iconic/svg/smart/social.svg" class="iconic facebook" alt="social"/></a></li>
                        <li><a href="https://www.youtube.com/user/DigilentInc"><img data-type="youtube" data-src="<?php print DOKU_TPL; ?>Iconic/svg/smart/social.svg" class="iconic youtube" alt="social"/></a></li>
                        <li><a href="https://instagram.com/digilentinc"><img data-type="instagram" data-src="<?php print DOKU_TPL; ?>Iconic/svg/smart/social.svg" class="iconic instagram" alt="social"/></a></li>
                        <li><a href="https://github.com/digilent"><img data-type="github" data-src="<?php print DOKU_TPL; ?>Iconic/svg/smart/social.svg" class="iconic github" alt="social"/></a></li>
                        <li><a href="https://www.reddit.com/r/digilent"><img data-type="reddit" data-src="<?php print DOKU_TPL; ?>Iconic/svg/smart/social.svg" class="iconic reddit" alt="social"/></a></li>
                        <li><a href="https://www.linkedin.com/company/1454013"><img data-type="linkedin" data-src="<?php print DOKU_TPL; ?>Iconic/svg/smart/social.svg" class="iconic linkedin" alt="social"/></a></li>
                        <li><a href="https://www.flickr.com/photos/127815101@N07"><img data-type="flickr" data-src="<?php print DOKU_TPL; ?>Iconic/svg/smart/social.svg" class="iconic flickr" alt="social"/></a></li>
                    </ul>
            </div>
        </div>
	</div>
	</div>

    <div class="no"><?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?></div>
    <!--[if ( IE 6 | IE 7 | IE 8 ) ]></div><![endif]-->

    <?php @require_once(dirname(__FILE__).'/tail-js.php'); ?>

    <!-- Mautic -->
    <script>
    (function(w,d,t,u,n,a,m){w['MauticTrackingObject']=n;
        w[n]=w[n]||function(){(w[n].q=w[n].q||[]).push(arguments)},a=d.createElement(t),
        m=d.getElementsByTagName(t)[0];a.async=1;a.src=u;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://mautic.digilentinc.com/mtc.js','mt');
    mt('send', 'pageview');

</script>
</body>
</html>



