<?php echo $topics['Topic']['title']; ?>
<?php echo $this->HTML->link('Create a post in this topic', array('controller' => 'posts', 'action'=> 'add', $topics['Topic']['id'])); ?>
<br>

<div id="post-comments">
    <?php $this->CommentWidget->options(array('allowAnonymousComment' => true));?>
    <?php echo $this->CommentWidget->display();?>
</div>
<table>

    <tr><td>Sr. No.</td><td>User</td><td>Post</td></tr>
<?php 
    $counter = 1;
    foreach($topics['Post'] as $post){

        echo "<tr><td>".$counter."</td><td>".$post['user_id']."</td><td>".$post['body']."</td></tr>";
    $counter++;
    }

?>

