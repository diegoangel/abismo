<div class="span3">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header"><?php echo __('Actions'); ?></li>
            <li><?php echo $this->Html->link(__('New Image'), array('action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Tenders'), array('controller' => 'tenders', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Tender'), array('controller' => 'tenders', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>

<div class="span9">
    <?php echo $this->Session->flash(); ?>
    <div class="page-header">
        <h1><?php echo __('Images'); ?></h1>
    </div>
    
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('referenced_type'); ?></th>                
                <th><?php echo $this->Paginator->sort('filename'); ?></th>
                <th><?php echo $this->Paginator->sort('active'); ?></th>
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($images as $image): ?>
            <tr>
                <td><?php echo h($image['Image']['id']); ?>&nbsp;</td>
                <td><?php echo h($image['Image']['referenced_type']); ?>&nbsp;</td>
                <td><?php echo h($image['Image']['filename']); ?>&nbsp;</td>
                <td><?php echo h($image['Image']['active']); ?>&nbsp;</td>
                <td><?php echo h($image['Image']['created']); ?>&nbsp;</td>
                <td><?php echo h($image['Image']['modified']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $image['Image']['id']), array('class' => 'btn btn-info')); ?>
                </td>
                <td>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $image['Image']['id']), array('class' => 'btn btn-warning')); ?>
                </td>
                <td>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $image['Image']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $image['Image']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>        
        </tbody>
    </table>

     <div class="well">
        <?php echo $this->Paginator->counter(array('format' => __d('cake', 'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))); ?>
    </div>
    <?php if ($this->Paginator->numbers()): ?>
        <div class="pagination">
            <ul>
                <?php echo $this->Paginator->first(); ?>
                <?php echo $this->Paginator->prev(); ?>
                <?php echo $this->Paginator->numbers(); ?>
                <?php echo $this->Paginator->next(); ?>
                <?php echo $this->Paginator->last(); ?>
            </ul>
        </div>
    <?php endif ?>

</div>
