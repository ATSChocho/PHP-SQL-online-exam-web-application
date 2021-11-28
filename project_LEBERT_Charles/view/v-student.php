<table class="ui compact celled definition table">
    <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Surname</th>
            <th>Best grade</th>

        </tr>
    </thead>
    <tbody>
        <form method="POST" action="index.php?action=deletes">
            <?php
            foreach ($array as $element) {
            ?>
                <?php if ($element->getTeacher()->getIdTeach() == $_SESSION['id']) { ?>
                    <tr>
                        <td class="collapsing">
                            <div class="ui fitted slider checkbox">
                                <input type="checkbox" name="choice[]" value="<?php echo ($element->getIdStudent()); ?>"><label></label>
                            </div>
                        </td>
                        <td><?php echo ($element->getNameStudent()) ?></td>
                        <td><?php echo ($element->getSurnameStudent()) ?></td>
                        <td><?php
                            $result = new Result();
                            $myresults = $result->findAll();
                            $temp = array();

                            foreach ($myresults as $element2) {
                                if ($element2->getStudent()->getIdStudent() == $element->getIdStudent()) {
                                    array_push($temp, $element2->getResult());
                                }
                            }
                            
                            if($temp != null){
                                $max = max($temp);
                                echo ($max);
                            }
                            else{
                                echo("No grade yet");
                            }
                            
                            ?></td>
                    </tr>
            <?php }
            } ?>

    </tbody>
    <tfoot class="full-width">
        <tr>
            <th></th>
            <th colspan="4">
                <div class="ui right floated small primary labeled icon button">
                    <i class="user icon"></i><a href="index.php?action=adds" style="color :white">Add Student</a>
                </div>
                
                <button type="submit" class="negative ui button">Supprimer</button>
            </th>
        </tr>
    </tfoot>
</table>
</form>
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>