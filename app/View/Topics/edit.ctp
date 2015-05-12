<h1>Edit Topic</h1>
<p>
    <?php echo $this->Html->link('Back', array('controller'=>'posts','action'=>'index'));?>
    </p>
<?php

    echo $this->Form->create('Topic');
   // echo $this->Form->input('user_id');
    echo $this->Form->input('title');
    echo $this->Form->input('visible');
    echo $this->Form->end('Save topic');

?>