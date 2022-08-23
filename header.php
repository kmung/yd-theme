<!DOCTYPE html>
<html lang="en">
<head>
    <!--Meta-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Zomi Youth Development">
    <!--Site Title-->
    <?php wp_head();?>
</head>
<body>
    <!--Main Navigation bar-->
    <header>
        <nav class="navbar navbar-expand-lg bg-primary py-2 sticky-top">
            <div class="container-fluid">
                <!--outputting logo-->
                <a class="navbar-brand" href="#">
                        <img class="mb-3 mx-auto logo" src="<?php echo $logo[0] ?>" alt="Zomi YD">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navigation" class="collapse navbar-collapse">
                    <!--getting logo-->
                    <?php if(function_exists('the-custom-logo')) {
                        $custom_logo_id = get_theme_mod('custom-logo');
                        $logo = wp_get_attachment_image_src($custom_logo_id, full);
                    }
                    ?>
                    <!--outputting nav menu-->    
                    <?php wp_nav_menu(array(
                            'menu' => 'primary',
                            'container' => '',
                            'theme_location' => 'primary',
                            //items_wrap to add Bootstrap classes, overriding default wp classes
                            'items_wrap' => '<ul id="" class="navbar-nav ms-auto">%3$s</ul>'
                            ));
                    ?>                 
                </div> 
            </div>
        </nav> 
    </header>
    <!--Start Main Wrapping-->
    <section class="bg-light text-dark p-2 p-lg-0 pt-lg-5 text-center text-sm-start">
        <!--Top heading-->
        <div class="d-sm-flex align-items-center justify content-between">
            <!--Page Title-->   
            <h1 class="heading"><?php the_title();?></h1>
        </div>
        
