<?php if ($data): ?>
    <div class="alert alert-success fade in alert-dismissable">
        <?php foreach ($data as $k => $v): ?>
            <p><?= $k; ?> / <?= $v; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
