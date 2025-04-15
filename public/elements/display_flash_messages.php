<?php if (is_flash_message()): ?>
    <?php foreach (get_flash_messages() as $message): ?>
        <p class="message"><?= $message ?></p>
    <?php endforeach; ?>
    <?php unset($_SESSION["flash_messages"]) ?>
<?php endif; ?>