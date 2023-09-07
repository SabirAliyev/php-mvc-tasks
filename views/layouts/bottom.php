<?php if (isset($_SESSION['task_added'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['task_added']; ?>
    </div>
    <?php unset($_SESSION['task_added']); ?>
<?php endif;

?>

<?php if (isset($_SESSION['task_error'])): ?>
    <div class="alert alert-danger">
        <?= $_SESSION['task_error']; ?>
    </div>
    <?php unset($_SESSION['task_error']); ?>
<?php endif;

?>