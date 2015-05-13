<!-- File: /app/Posts/view.ctp -->

<h1><?php echo h($posts['Topic']['title']); ?></h1>

<p><small>Created: <?php echo $posts['Post']['created']; ?></small></p>
<p><?php echo h($posts['Post']['body']); ?></p>
<div id = "ratingform"><?php if ($isRated === false) {
          echo $this->Rating->display(array(
              'item' => $posts['Post']['id'],
              'url' => array($posts['Post']['id']),
          ));
      } else {
          echo __('You have already rated.    ');
          echo $isRated['Rating']['value'];
      }

?></div>
 <script type="text/javascript">
    $('#ratingform').starForm({
        split:2,
        cancelShow:false,
        callback: function(ui, type, value) {
            ui.$form.submit();
        }
    });</script>
