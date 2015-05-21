<h1>Posts</h1>

<table>
<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Post body</th>

</tr>

<?php foreach($posts as $post) : ?>
<tr>
    <td><?php echo $this->HTML->link($post['Post']['id'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?></td>
    <td><?php echo $this->HTML->link($post['Topic']['title'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?></td>
     <td><?php echo $post['Post']['body']; ?></td>

</tr>

<?php endforeach;?>

<?php unset($post);?>
</table>
