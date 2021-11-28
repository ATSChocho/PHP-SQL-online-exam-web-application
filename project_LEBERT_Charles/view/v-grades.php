<table class="ui celled table">
    <thead>
        <tr>
            <th>Result</th>
            <th>Passing</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            foreach ($array as $element) {
                if ($element->getStudent()->getIdStudent() == $_SESSION['id']) { ?>
                    <td><?php echo ($element->getResult()) ?></td>
                    <?php
                    if ($element->getResult() >= 30) { ?>
                        <td><i class="large green checkmark icon"></i>Yes</td>
                    <?php } else { ?>
                        <td><i class="close large red icon"></i>No</td>
                    <?php }
                    ?>
        </tr>
<?php }
            }
?>
</tr>
    </tbody>
</table>