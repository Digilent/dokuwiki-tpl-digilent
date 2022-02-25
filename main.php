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
        <?php
            if (wl($ID, false) == strip_tags($conf['baseurl']) . 'start') {
                echo strip_tags($conf['title']) . ' - Manuals, Guides, Projects, and More';
            } else {
                tpl_pagetitle(); echo ' - ' . strip_tags($conf['title']);
            }
        ?>
    </title>
    
    <script src="https://use.typekit.net/axp2oni.js"></script>
    <script>try{Typekit.load({ async: false });}catch(e){}</script>
    
    <?php @require_once(dirname(__FILE__).'/head-css.php'); ?>
<?php
// $brandImg = tpl_getConf('header_img');
$brandImg = '/reference/_media/digilent-logo-reference-260.png';
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

<!--BEGIN QUALTRICS WEBSITE FEEDBACK SNIPPET-->
<script type='text/javascript'>
(function(){var g=function(e,h,f,g){
this.get=function(a){for(var a=a+"=",c=document.cookie.split(";"),b=0,e=c.length;b<e;b++){for(var d=c[b];" "==d.charAt(0);)d=d.substring(1,d.length);if(0==d.indexOf(a))return d.substring(a.length,d.length)}return null};
this.set=function(a,c){var b="",b=new Date;b.setTime(b.getTime()+6048E5);b="; expires="+b.toGMTString();document.cookie=a+"="+c+b+"; path=/; "};
this.check=function(){var a=this.get(f);if(a)a=a.split(":");else if(100!=e)"v"==h&&(e=Math.random()>=e/100?0:100),a=[h,e,0],this.set(f,a.join(":"));else return!0;var c=a[1];if(100==c)return!0;switch(a[0]){case "v":return!1;case "r":return c=a[2]%Math.floor(100/c),a[2]++,this.set(f,a.join(":")),!c}return!0};
this.go=function(){if(this.check()){var a=document.createElement("script");a.type="text/javascript";a.src=g;document.body&&document.body.appendChild(a)}};
this.start=function(){var t=this;"complete"!==document.readyState?window.addEventListener?window.addEventListener("load",function(){t.go()},!1):window.attachEvent&&window.attachEvent("onload",function(){t.go()}):t.go()};};
try{(new g(100,"r","QSI_S_ZN_9mGrPMbiRHWifVc","https://zn9mgrpmbirhwifvc-singuser98edbb5b.siteintercept.qualtrics.com/SIE/?Q_ZID=ZN_9mGrPMbiRHWifVc")).start()}catch(i){}})();
</script>
<div id='ZN_9mGrPMbiRHWifVc'><!--DO NOT REMOVE-CONTENTS PLACED HERE--></div>
<!--END WEBSITE FEEDBACK SNIPPET-->

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/553b1116bb.js" crossorigin="anonymous"></script>

<!-- Cookie Policy Notification -->
<link rel="stylesheet" type="text/css" href="https://s3-us-west-2.amazonaws.com/digilent/resources/cdn/cookieconsent.min.css"/>
<script src="https://s3-us-west-2.amazonaws.com/digilent/resources/cdn/cookieconsent.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/digilent/resources/cdn/digilent-cookie-consent.js"></script>

<!-- Mautic forms -->
<script type="text/javascript">
    /** This section is only needed once per page if manually copying **/
    if (typeof MauticSDKLoaded == 'undefined') {
        var MauticSDKLoaded = true;
        var head            = document.getElementsByTagName('head')[0];
        var script          = document.createElement('script');
        script.type         = 'text/javascript';
        script.src          = 'https://mautic.digilentinc.com/media/js/mautic-form.js';
        script.onload       = function() {
            MauticSDK.onLoad();
        };
        head.appendChild(script);
        var MauticDomain = 'https://mautic.digilentinc.com';
        var MauticLang   = {
            'submittingMessage': "Please wait..."
        }
    }
</script>
<script type="text/javascript">
    var formName = 'digilentnewsletterbigcommerceform';
    if (typeof MauticFormCallback == 'undefined') {
        var MauticFormCallback = {};
    }

    MauticFormCallback[formName] = { onValidateStart: function() {
        let refInput = document.getElementById('mauticform_input_digilentnewsletterbigcommerceform_referrer');
        refInput ? refInput.value = document.referrer : false;

        let pageInput = document.getElementById('mauticform_input_digilentnewsletterbigcommerceform_page');
        pageInput ? pageInput.value = document.location.href : false;
    },};
</script>


<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NHG3J9R');</script>
<!-- End Google Tag Manager -->

<script src="https://digilent.s3.us-west-2.amazonaws.com/resources/cdn/sitewide-banner/src/sitewide-banner.js"></script>
<link href="https://digilent.s3.us-west-2.amazonaws.com/resources/cdn/sitewide-banner/src/sitewide-banner.css" rel="stylesheet">

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
	<div class="navbar navbar-default navbar-fixed-top" id="navbar">
            <div>
                <ul id="header-tabs">
                    <li>
                        <a href="https://digilent.com">Shop</a>
                    </li>
                    <li id="wiki-tab">
                        <a href="https://digilent.com/reference">Reference</a>
                    </li>
                </ul>
                <div id="ni-tag">An NI Company</div>
            </div>


            <div class="container">
                <?php tpl_includeFile('header.html') ?>
                <div id="header-main">
                    
                    <div class="flex-container">
                        <button class="navbar-toggle" data-toggle="collapse" data-target="#topnav" type="button">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!---------------Search--------------->
                        <?php _tpl_searchform() ?>
                        
                        <!---------------Logo ---------------> 
                        <?php if ($brandImg != '') { ?>
                            <div id="logo"><a class="navbar-brand-img" href="/reference"><img src="<?php echo $brandImg; ?>" alt="<?php $conf['title'] ?>"></a></div>
                        <?php } ?>
                        <?php if ($brandImg == '' || tpl_getConf('header_title')) {
                        tpl_link(wl(),$conf['title'],'accesskey="h" title="[H]" class="navbar-brand"');
                        } ?>

                        <!---------------Tools ---------------> 
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle toolsdrop" data-toggle="dropdown">
                                <i id="tools-icon" class="fas fa-tools"></i><span id="tools-text">
                                Internal Tools</span><b class="caret"></b></a>
                                <ul id="tools-menu" class="dropdown-menu hortop">
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
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div id="header-categories">
                <div class="container">
                    <div class="container navbar-collapse collapse" id="topnav">				
                        <!---------------Generate Navbar--------------->					
                            
                            <!------------------------------------------------------------------------------------------				
                            - START WIKI NAV
                            ---------------------------------------------	--------------------------------------------->
                            <?php
                                echo getNavBar();
                            ?>
                            <!------------------------------------------------------------------------------------------				
                            - END WIKI NAV
                            ---------------------------------------------	--------------------------------------------->
                            
                    </div>
                </div>
            </div>	

            <section id="sitewide-banner-slot"></section>
        </div>

	<!-------------------------------------END OF HEADER------------------------------------->
        <div class="container<?php if ((int) tpl_getConf('full_width') === 1) { echo "-fluid"; } ?> not-header">
            <div class="notifications hidden-print">
                <?php html_msgarea() /* occasional error and info messages on top of the page */ ?>
            </div>

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
            <div class="row footer-links">

                <div class="footer-info-col col-xs-12 col-sm-6 col-md-2">
                    <h5 class="footer-info-heading">
                        <a href="https://digilent.com/company/">Company</a>
                    </h5>
                    <ul >
                        <li>
                            <a href="https://digilent.com/company/#about-digilent">About Us</a>
                        </li>
                        <li>
                            <a href="https://digilent.com/company/#faqs">FAQs</a>
                        </li>
                        <li>
                            <a href="https://digilent.com/shipping-returns/">Shipping & Returns</a>
                        </li>
                        <li>
                            <a href="https://digilent.com/company/#jobs">Jobs</a>
                        </li>
                        <li>
                            <a href="https://digilent.com/legal-privacy/">Legal & Privacy</a>
                        </li>
                    </ul>
                </div>

                <div class="footer-info-col col-xs-12 col-sm-6 col-md-2">
                    <h5 class="footer-info-heading">
                        <a href="https://digilent.com/news/">News</a>
                    </h5>
                    <ul >
                        <li>
                            <a href="https://digilent.com/blog/">Blog</a>
                        </li>
                        <li>
                            <a href="https://digilent.com/news/#newsletter">Newsletter</a>
                        </li>
                        <li>
                            <a href="https://digilent.com/news/#events">Events</a>
                        </li>
                    </ul>
                </div>

                <div class="footer-info-col col-xs-12 col-sm-6 col-md-2">
                    <h5 class="footer-info-heading">
                        <a href="https://digilent.com/affiliations/">Affiliations</a>
                    </h5>
                    <ul >
                        <li>
                            <a href="https://digilent.com/affiliations/#distributors">List of Distributors</a>
                        </li>
                        <li>
                            <a href="https://digilent.com/affiliations/#partners">Technology Partners</a>
                        </li>
                    </ul>
                </div>

                <div class="footer-info-col col-xs-12 col-sm-6 col-md-4">
                    <h5 class="footer-info-heading">Subscribe to our newsletter</h5>
                    <p>Get the latest updates on new products and upcoming sales</p>

                    <script type="text/javascript" src="//mautic.digilentinc.com/form/generate.js?id=143"></script>
                </div>

                <div class="footer-info-col col-xs-12 col-sm-6 col-md-2">
                    <h5 class="footer-info-heading">Contact Us</h5>
                    <ul id="contact-us-links">
                        <li>
                            <a href="https://digilent.com/support/#channels">Support Channels</a>
                        </li>
                    </ul>
                    <address>
                        Digilent<br>
                        1300 NE Henley Ct. Suite 3<br>
                        Pullman, WA 99163<br>
                        United States of America
                    </address>
                </div>

                <div class="footer-info-col col-xs-12 social">
                    <ul class="socialLinks">
                        <li class="socialLinks-item">
                            <a href="http://twitter.com/DigilentInc" target="_blank" rel="noopener">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="socialLinks-item">
                            <a href="http://facebook.com/Digilent" target="_blank" rel="noopener">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="socialLinks-item">
                            <a href="https://www.youtube.com/user/DigilentInc" target="_blank" rel="noopener">
                                <i class="fa fa-youtube"></i>
                            </a>
                        </li>
                        <li class="socialLinks-item">
                            <a href="https://github.com/digilent" target="_blank" rel="noopener">
                                <i class="fa fa-github"></i>
                            </a>
                        </li>
                        <li class="socialLinks-item">
                            <a href="https://instagram.com/digilentinc" target="_blank" rel="noopener">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>
                        <li class="socialLinks-item">
                            <a href="https://www.linkedin.com/company/1454013" target="_blank" rel="noopener">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                        <li class="socialLinks-item">
                            <a href="https://www.flickr.com/photos/127815101@N07" target="_blank" rel="noopener">
                                <i class="fa fa-flickr"></i>
                            </a>
                        </li>
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

    <!-- Lucky Orange -->
    <script type='text/javascript'>
    window.__lo_site_id = 287347;
	(function() {
		var wa = document.createElement('script'); wa.type = 'text/javascript'; wa.async = true;
		wa.src = 'https://d10lpsik1i8c69.cloudfront.net/w.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(wa, s);
	  })();
	</script>

</body>
</html>



