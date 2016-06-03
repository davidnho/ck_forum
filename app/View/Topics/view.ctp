<h1><?php echo $topic['Topic']['title']; ?></h1>
<?php echo $this->HTML->link('Create a post in this topic', array('controller' => 'posts', 'action' => 'add', $topic['Topic']['id'])); ?>
<p>
    <?php
    foreach ($topic['Post'] as $post) {
        echo $post['body'] . '<br>';
    }
    ?> 
</p>
