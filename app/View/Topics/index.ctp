<h1>Topics</h1>

</br>
<?php echo $this->HTML->link('Create a topic', array('controller' => 'topics', 'action'=> 'add')); ?>
<br>
<?php
    $searchItem = "title";
    echo $this->Form->create();
    echo $this->Form->input($searchItem);
    echo $this->Form->input('visible', array(
            'type' => 'checkbox'
        ));
    echo $this->Form->end(__('Search'));
    ?>


<table>
<tr>
    <th>Title</th>
    <th>User ID</th>
    <th>Published</th>
    <th>Created</th>
    <th>Modified</th>
    <th>edit</th>
    <th>delete</th>
</tr>
    
<?php foreach($topics as $topic) : ?>
<tr>
    <td><?php echo $this->HTML->link($topic['Topic']['title'], array('controller' => 'topics', 'action' => 'view', $topic['Topic']['id'])); ?></td>
    <td><?php echo $topic['Topic']['user_id']; ?></td>
    <td><?php echo $topic['Topic']['visible']; ?></td>
    <td><?php echo $topic['Topic']['created']; ?></td>
    <td><?php echo $topic['Topic']['modified']; ?></td>
    <td><?php echo $this->HTML->link('Edit', array('controller' => 'topics', 'action' => 'edit', $topic['Topic']['id'])); ?></td>
    <td><?php echo $this->Form->postLink('Delete', array('controller' => 'topics', 'action' => 'delete', $topic['Topic']['id']),array('confirm' => 'conform delete')); ?></td>
</tr>

<?php endforeach; ?>

<?php unset($topic);?>
</table>
 <p>
<?php echo $this->Html->link('new post', array('controller'=>'topics','action'=>'add'));?>
</p>