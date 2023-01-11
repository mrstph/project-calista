
<?php if ($messages = messages()): ?>
    <section>
        <ul>
            <?php foreach ($messages as $msg): ?>
                <li><?php echo $msg ?></li>
            <?php endforeach; ?>
        </ul>
    </section>

<?php unset($_SESSION['messages']); ?>
<?php endif; ?>
