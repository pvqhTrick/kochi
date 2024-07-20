<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 */
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php wp_title('|', true, 'right'); ?></title>
	<?php wp_head(); ?>
</head>

<body>
    <div id="header">
        <div class="wraper">
            <h1 class="logo"><a class="hoverJS" href="<?php echo home_url(); ?>"><img src=<?php echo get_theme_file_uri().'/img/common/logo.png' ?> alt="WELCOME KOCHI"></a></h1>
            <p class="headerBtn">
                <a class="hoverJS" href="#toparea4"><img src=<?php echo get_theme_file_uri().'/img/common/header_btn.png'?> alt="GUIDE BOOK"></a>
            </p>
            <?php kochi_hung_menu_nav(); ?>
            <!-- .mainMenu -->
        </div>
        <!-- .wraper -->
    </div>
    <?php var_dump($locations);?>
    <!-- #header -->