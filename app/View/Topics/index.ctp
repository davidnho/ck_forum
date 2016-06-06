<h2>All Topics </h2>
<?php echo $this->HTML->link('Create a new topic', array('controller' => 'topics', 'action' => 'add')); ?>
<br>

<?php
if (AuthComponent::user()) {
    echo $this->HTML->link('Logout', array('controller' => 'users', 'action' => 'logout'));
} else {
    echo $this->HTML->link('Login', array('controller' => 'users', 'action' => 'login'));
}
?>
<br>
<table>
    <tr>
        <th>Title</th>
        <th>User Id</th>
        <th>Published</th>
        <th>Created</th>
        <th>Modified</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($topics as $topic) { ?>
        <tr>
            <?php if (AuthComponent::user('role') == 2) : ?>   

                <td><?php echo $this->HTML->link($topic['Topic']['title'], array('controller' => 'topics', 'action' => 'view', $topic['Topic']['id'])); ?></td>
                <td><?php echo $topic['Topic']['user_id']; ?></td>
                <td><?php echo $topic['Topic']['visible']; ?></td>
                <td><?php echo $topic['Topic']['created']; ?></td>
                <td><?php echo $topic['Topic']['modified']; ?></td>
                <td><?php echo $this->HTML->link('Edit', array('controller' => 'topics', 'action' => 'edit', $topic['Topic']['id'])); ?></td>
                <td><?php echo $this->Form->postLink('Delete', array('controller' => 'topics', 'action' => 'delete', $topic['Topic']['id']), array('confirm' => 'Are you sure you want to delete this topic?')); ?></td>        <?php endif; ?>
        </tr>
        <tr>
            <?php if (AuthComponent::user('role') == 1) : ?>   
                <?php if ($topic['Topic']['visible'] == 1): ?>

                    <td><?php echo $this->HTML->link($topic['Topic']['title'], array('controller' => 'topics', 'action' => 'view', $topic['Topic']['id'])); ?></td>
                    <td><?php echo $topic['Topic']['user_id']; ?></td>
                    <td><?php echo $topic['Topic']['visible']; ?></td>
                    <td><?php echo $topic['Topic']['created']; ?></td>
                    <td><?php echo $topic['Topic']['modified']; ?></td>
                    <td><?php echo $this->HTML->link('Edit', array('controller' => 'topics', 'action' => 'edit', $topic['Topic']['id'])); ?></td>
                    <td><?php echo $this->Form->postLink('Delete', array('controller' => 'topics', 'action' => 'delete', $topic['Topic']['id']), array('confirm' => 'Are you sure you want to delete this topic?')); ?></td>
                <?php endif; ?>
            <?php endif; ?>
        </tr>
        <?php
    }
    unset($topic);
    ?>
</table>


<!--for testing ...-->
<?php
//echo $framework . '<br>';
//foreach ($names as $name) {
//    echo $name . '<br>';
//}
//foreach ($info as $inf) {
//    echo $inf . '<br>';
//}
?>