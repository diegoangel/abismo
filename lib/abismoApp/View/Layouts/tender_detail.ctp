<?php echo $this->Html->docType('html5'); ?>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo __('ab.ismo || Oficina de arquitectura'); ?>
    </title>
<!--[if lt IE 9]><script src="js/shiv.js"></script><![endif]-->    
    <?php
        echo $this->Html->meta('icon');
        echo $this->Html->meta('viewport', 'width=device-width, initial-scale=1.0');
        echo $this->fetch('meta');
        echo $this->Html->css('reset.css');
        echo $this->Html->css('fonts.css');
        echo $this->Html->css('style.css');
        echo $this->fetch('css');
        echo $this->Html->script('jquery-1.9.1.min.js');
        echo $this->Html->script('jquery.carouFredSel-6.2.0-packed.js');
        echo $this->Html->script('scripts.js');
        echo $this->fetch('script');
    ?>
</head>
<body class="detalle">
    <header>   
        <?php echo $this->element('contact') ?>
        <section class="inner">
            <h1>
            <?php 
                echo $this->Html->link(
                    $this->Html->image(
                        'abismo-logo.png', 
                        array('alt' => 'ab.ismo || Oficina de arquitectura')
                    ),
                    '/home', 
                    array(
                        'escape' => false
                    )
                ); 
            ?>  
            </h1>    
            <?php echo $this->element('nav') ?>
            <nav class="submenu">
                <ul>
                    <li>
                    <?php 
                        echo $this->Html->link(
                            'all work',
                            '/concursos',
                            array(
                                'class' => 'all'
                            )
                        ); 
                    ?>
                        </li>
                    <li>
                        <?php 
                            if (is_null($pagination['prev'])) { 
                                $prev = '#';
                            } else {
                                $prev = '/concursos/detalle/' . $pagination['prev']['Tender']['id'] . '-' . $this->Slug->transform($pagination['prev']['Tender']['title']);
                            }
                        ?>
                        <a rel="prev" href="<?php echo $prev ?>" class="prev">prev project</a>
                    </li>
                    <li>
                        <?php 
                            if (is_null($pagination['next'])) { 
                                $next = '#';
                            } else {
                                $next = '/concursos/detalle/' . $pagination['next']['Tender']['id'] . '-' . $this->Slug->transform($pagination['next']['Tender']['title']);
                            }
                        ?>                        
                        <a rel="next" href="<?php echo $next ?>" class="next">next project</a>
                    </li>
                </ul>
            </nav>            
        </section>
    </header>   
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('content'); ?>       
    <?php echo $this->element('footer') ?>
</body>
</html>
