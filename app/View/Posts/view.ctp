<!-- File: /app/Posts/view.ctp -->

<h1><?php echo h($posts['Topic']['title']); ?></h1>

<p><small>Created: <?php echo $posts['Post']['created']; ?></small></p>
<div id="post-comments">
    <?php $this->CommentWidget->options(array('allowAnonymousComment' => false));?>
    <?php echo $this->CommentWidget->display();?>
</div>

<p><?php echo h($posts['Post']['body']); ?></p>
<div id = "ratingform">

<?php if ($isRated === false) {
          echo $this->Rating->starForm(array(
                 'item' => $posts['Post']['id'],
                 'url' => array($posts['Post']['id']),
                  ));

      } else {
          echo __('You have already rated.  ');

      }
  ?>


  </div>
  <script type="text/javascript">
  $('#ratingform').stars({
      split:2,
      cancelShow:false,
      callback: function(ui, type, value) {
          ui.$form.submit();
      }
      });
  </script>
