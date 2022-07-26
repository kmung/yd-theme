<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head();?>
    <?php wp_nav_menu(
        array(
            'menu' => 'primary',
            'container' => '',
            'theme_location' => 'primary'
        )
        );
    ?>
</head>
<body>
    <div class="main-wrapper">
    <header class="header text-center">
        <!--Page Title-->
        <h1><?php the_title();?></h1>
    </header>
    </div>
