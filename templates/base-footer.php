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
</body>

</html>