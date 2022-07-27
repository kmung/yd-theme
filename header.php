<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head();?>
</head>
<body>
    <header class="header">
        <nav class="navbar navbar-extend-lg">
            <div class="container-fluid">
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
        </nav> 
    </header>
