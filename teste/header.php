<!DOCTYPE html>
<html>
<head>
    <?php $home = get_template_directory_uri(); ?>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo $home ?>/assets/css/comum.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $home ?>/assets/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $home ?>/assets/css/<?php $css_especifico; ?>.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $home ?>/assets/css/<?php $css_especifico; ?>.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $home ?>/assets/css/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $home ?>/assets/css/<?php $css_especifico; ?>.css">
   
    <title>
    <?php geraTitle() ?>
    </title>
    
    <?php wp_head();?>
</head>

<body>

<header>
    <div class="container">
        <?php 
            $args = array(
                'theme_location' => 'header-menu'
            );
            wp_nav_menu($args);
        ?>
    </div>

</header>
