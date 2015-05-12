<h1>Create Topic</h1>
<p>
    <?php echo $this->Html->link('Back', array('controller'=>'topics','action'=>'index'));?>
    </p>
<?php

    echo $this->Form->create('Topic');
   // echo $this->Form->input('user_id');
    echo $this->Form->input('title');
    echo $this->Form->input('visible');
    echo $this->Form->input('tags', array('type' => 'text'));
    echo $this->Form->end('Save topic');

?>