<!-- File: /app/View/Posts/view.ctp -->

<h1><?php echo h($posts['Topic']['title']); ?></h1>

<p><small>Created: <?php echo $posts['Post']['created']; ?></small></p>
<p><?php echo h($posts['Post']['body']); ?></p>
<?php if ($isRated === false) {
          echo $this->Rating->display(array(
              'item' => $posts['Post']['topic_id'],
              'type' => 'radio',
              'stars' => 5,
              'createForm' => array(
                      'url' => array(
                          $this->passedArgs, 'rate' => $Rating['user_id'],
                          'redirect' => true
                      )
              )
          ));
      } else {
          echo __('You have already rated.');
      }

?>
<script type="text/javascript">
$('#ratingform').stars({
    split:2,
    cancelShow:false,
    callback: function(ui, type, value) {
        ui.$form.submit();
    }
});</script>
