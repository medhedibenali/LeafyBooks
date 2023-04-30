<?php
foreach ($scripts ?? [] as $script) {
    if (is_array($script)) {
?>
        <script <?php
                foreach ($script as $key => $value) {
                    echo "$key=\"$value\" ";
                }
                ?>>
        </script>
    <?php
    } else {
    ?>
        <script src="<?= $script ?>">
        </script>
<?php
    }
}
?>
<div>
    <i class="fa-duotone fa-arrow-up fa-bounce" style="--fa-primary-color: #51411f; --fa-secondary-color: #d99a12;"></i>
</div>
</body>

</html>