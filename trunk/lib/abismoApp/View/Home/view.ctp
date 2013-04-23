        <div class="imgBg">
            <?php echo 'images' . DS . $project['Image'][0]['filepath'];
                if(count($project['Image']) > 0 && file_exists('images' . DS . $project['Image'][0]['filepath'])) {
                    echo $this->Html->link(
                        $this->Html->image(
                            $project['Image'][0]['filepath'], 
                            array('alt' => $project['Image'][0]['alt'])
                        ), 
                        '/proyectos/detalle/' . $project['Project']['id'] . '-' . $this->Slug->transform($project['Project']['title']),
                        array('escape' => false)
                    );
                } else {
                    echo $this->Html->link(                    
                        $this->Html->image(
                            'default-home.jpg', 
                            array('alt' => 'default')
                        ), 
                        '/proyectos',
                        array('escape' => false)
                    );                    
                }
            ?>        
        </div>
        <div class="titleBg">
            <?php
                if(count($project['Image']) > 0) {                  
                     echo $this->Html->link(
                            $project['Image'][0]['title'], 
                            '/proyectos/detalle/' . $project['Project']['id'] . '-' . $this->Slug->transform($project['Project']['title']), 
                            array('escape' => false)
                        ); 
                }
            ?> 
        </div> 
