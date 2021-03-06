<h1>Topics</h1>

</br>
<?php echo $this->HTML->link('Create a topic', array('controller' => 'topics', 'action'=> 'add')); ?>
<br>


<?php
		 echo $this->I18n->flagSwitcher(array(
                'class' => 'languages',
                'id' => 'language-switcher'
            ));

?>
   <div><?php
           echo $this->Form->create('Topic', array(
               'url' => array_merge(array('action' => 'index'), $this->params['pass'])
               ));
           echo $this->Form->input('name', array('empty' => true)); // empty creates blank option.
           echo $this->Form->submit(__('Search', false), array('div' => false));
     echo $this->Form->input('from', array(
            'type' => 'date',
            //'div' => false,
            'dateFormat' => 'MDY',
            'minYear' => 2013,
            'maxYear' => date('Y'),
            'style' => 'margin-right: 2px; margin-left: 2px',
            'empty' => true,
            'timeFormat' => null,
            'selected' => array(
                'day' => 1,
                'month' => 5,
                'year' => 2014
                ),
            'empty' => false
            ));
             echo $this->Form->input('to', array(
            'type' => 'date',
            'div' => false,
            'dateFormat' => 'MDY',
            'minYear' => 2013,
            'maxYear' => date('Y'),
            'empty' => true,
            'style' => 'margin-right: 2px; margin-left: 2px',
            'timeFormat' => null,
            'selected' => array(
                'day' => date('D'),
                'month' => date('M'),
                'year' => date('Y')
                ),
            'empty' => false
            ));
            echo $this->Form->end();
       ?>
  </div>

	<p><?php
	echo $this->Paginator->counter(array(
		'format' => __d('topics', 'Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
	));
	?></p>

	<table cellpadding="0" cellspacing="0">
	<tr>
        <th><?php echo $this->Paginator->sort('title'); ?></th>
        <th><?php echo $this->Paginator->sort('User ID'); ?></th>
        <th><?php echo $this->Paginator->sort('Published'); ?></th>
        <th><?php echo $this->Paginator->sort('Created'); ?></th>
        <th><?php echo $this->Paginator->sort('Modified'); ?></th>
        <th class="actions"><?php echo __d('topics', 'Actions'); ?></th>
</tr>
<?php
	$i = 0; ?>
<?php foreach($topics as $topic) :
        $class = null;
		if ($i++ % 2 == 0) :
			$class = ' class="altrow"';
		endif;
		?>
<tr>
    <td><?php echo $this->HTML->link($topic['Topic']['title'], array('controller' => 'topics', 'action' => 'view', $topic['Topic']['id'])); ?></td>
    <td><?php echo $topic['Topic']['user_id']; ?></td>
    <td><?php echo $topic['Topic']['visible']; ?></td>
    <td><?php echo $topic['Topic']['created']; ?></td>
    <td><?php echo $topic['Topic']['modified']; ?></td>
    <td><?php echo $this->HTML->link(__d('topics', 'Edit'), array('controller' => 'topics', 'action' => 'edit', $topic['Topic']['id'])); ?>
        <?php echo $this->Form->postLink(__d('topics', 'Delete'), array('controller' => 'topics', 'action' => 'delete', $topic['Topic']['id']),array('confirm' => 'conform delete')); ?>
    </td>
</tr>

<?php endforeach; ?>

<?php unset($topic);?>
</table>
<?php echo $this->element('Users.pagination'); ?>
 <p>
<?php echo $this->Html->link('new post', array('controller'=>'topics','action'=>'add'));?>
</p>