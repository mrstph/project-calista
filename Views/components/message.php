
<?php if ($messages = messages()): ?>
    <section>
        <ul>
            <?php foreach ($messages as $msg) : ?>
                <div class="alert alert-dismissible my-4 <?php echo $msg[1]; ?>">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <?php echo $msg[0] ?>
                </div>
            <?php endforeach; ?>
        </ul>
    </section>

<?php unset($_SESSION['messages']); ?>
<?php endif; ?>
