<!DOCTYPE html>
<html lang="en">
<head>
    <!--Meta-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head();?>
</head>
<body>
    <!--Navigation bar-->
    <header class="header">
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container">
                <!--Outputting logo-->
                <?php if(function_exists('the-custom-logo')) {
                    $custom_logo_id = get_theme_mod('custom-logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id);
                }
                ?>
                <a class="navbar-brand" href="#">
                <img src="<?php echo $logo[0] ?>" alt="yd logo" width="30" height="25">
                </a>

                <div class="d-flex justify-content-center">
                    <!--outputting nav menu-->    
                <?php wp_nav_menu(
                        array(
                            'menu' => 'primary',
                            'container' => '',
                            'theme_location' => 'primary',
                            //items_wrap to add Bootstrap classes, overriding default wp classes
                            'items_wrap' => '<ul id="" class="">%3$s</ul>'
                            )
                        );
                    ?>
                </div>  
            </div> 
        </nav> 
    </header>
