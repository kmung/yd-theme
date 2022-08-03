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
    <!--Left-side Navigation bar-->
    <header class="header text-center">
        <nav class="navbar navbar-expand-lg bg-primary">
            
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div id="navigation" class="collapse navbar-collapse flex-column">
                    <!--getting logo-->
                    <?php if(function_exists('the-custom-logo')) {
                        $custom_logo_id = get_theme_mod('custom-logo');
                        $logo = wp_get_attachment_image_src($custom_logo_id, full);
                    }
                    ?>
                    <!--outputting logo-->
                    <a class="navbar-brand" href="#">
                        <img class="mb-3 mx-auto logo" src="<?php echo $logo[0] ?>" alt="yd logo">
                    </a>

                    <div class="d-flex justify-content-center">
                        <!--outputting nav menu-->    
                        <?php wp_nav_menu(
                                array(
                                    'menu' => 'primary',
                                    'container' => '',
                                    'theme_location' => 'primary',
                                    //items_wrap to add Bootstrap classes, overriding default wp classes
                                    'items_wrap' => '<ul id="" class="navbar-nav flex-column text-sm-center text-md-left">%3$s</ul>'
                                    )
                                );
                            ?>
                    </div>  
                </div> 
        </nav> 
    </header>
    <!--Top heading-->
    <div class="main-wrapper">
        <header class="page-title theme-bg-light text-center gradient py-5">
            <!--Page Title-->   
            <h1 class="heading"><?php the_title();?></h1>
        </header>
        
