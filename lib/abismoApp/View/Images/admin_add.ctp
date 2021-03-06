<div class="span3">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header"><?php echo __('Actions'); ?></li>
            <li><?php echo $this->Html->link(__('List Images'), array('action' => 'index')); ?></li>
            <li class="divider"></li>  
            <li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
            <li class="divider"></li>  
            <li><?php echo $this->Html->link(__('List Tenders'), array('controller' => 'tenders', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Tender'), array('controller' => 'tenders', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>

<div class="span9">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->Form->create('Image', array('type' => 'file')); ?>
        <fieldset>
            <legend><?php echo __('Add Image'); ?></legend>
        <?php
            echo $this->Form->hidden('referenced_id');
            echo $this->Form->hidden('referenced_type');
            echo $this->Form->input(
                'belongsToName',
                array(
                    'type' => 'text',
                    'label' => __('Related to ID'),
                    'autocomplete' => 'off',                    
                    'after' => '',
                    'help' => 'Comience a escribir el nombre del proyecto o concurso al cual desea relacionar la imagen e inmediatamente se desplegara una lista con las coincidencias encontradas.'
                )
            );
            echo $this->Form->input(
                'type', 
                array('options' => array(
                    'home' => 'Home', 
                    'slide' => 'Destacada', 
                    'thumb' => 'Thumbnail'), 
                    'empty' => 'Seleccione un tipo',
                    'label' => __('Image type'),
                    'after' => '',                    
                    'help'  => 'Seleccione el tipo de imagen que desea guardar, Home (se ve en la pagina de inicio), Destacadalle del proyecto (se ve en la pagina de listado de proyectos) o Thumbnail (se ve en la pagina del det)'
                )
            );     
            echo $this->Form->input(
                'title', 
                array(
                    'autocomplete' => 'off',
                    'label' => __('Title')
                )
            );
            echo $this->Form->input(
                'filepath', 
                array(
                    'type' => 'file',
                    'autocomplete' => 'off'
                )
            );
            echo $this->Form->input(
                'alt', 
                array('label' => __('Alternative text'))
            );
            echo $this->Form->input(
                'active', 
                array('label' => __('Active'))
            );
        ?>
        </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>

<?php
$linkToService =  $this->Html->url(array(
    'controller' => 'GetProjectsAndTendersService',
    'action' => 'getProjectsAndTenders',
    'admin' => false
));
?>
<script type="text/javascript"> 
    $.get('<?php echo $linkToService ?>', function(data) {
        data = $.parseJSON(data)
        $('#ImageBelongsToName').typeahead({
            source: data,
            display: 'title',
            itemSelected: function(selected, value, text) {
                    $('#ImageReferencedId').val(value);
                    $('#ImageReferencedType').val(function() {
                        for (var i = 0; i < data.length; i++) {
                            if (data[i].title == text) {
                                return data[i].type
                            }
                        }
                    });
                },
            items: 10
        });  
    });
</script>

