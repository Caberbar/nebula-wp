<div class="custom-array-metabox">
    <table class="staff-table">
        <thead>
            <tr>
                <th class="th-name">Name: </th>
                <th class="th-rol">Rol: </th>
                <th class="th-delete"></th>
            </tr>
        </thead>
        <tbody id="custom-array-tbody">
            <?php

            if (!empty($custom_array_values)) {

                foreach ($custom_array_values as $index => $row) {
            ?>
                    <tr>
                        <td><input type="text" class="td-name" value="<?php echo $row['key1'] ?>" name="mpm_custom_array_field[<?php echo $index ?>][key1]"></td>
                        <td><input type="text" class="td-rol" value="<?php echo $row['key2'] ?>" name="mpm_custom_array_field[<?php echo $index ?>][key2]"></td>
                        <td><button type="button" id="remove-row" style="display: flex;align-items: center;" class="button button-primary td-delete"><span class="dashicons dashicons-trash"></span>&nbsp;Remove</button></td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td><input type="text" class="td-name" value="" name="mpm_custom_array_field[0][key1]"></td>
                    <td><input type="text" class="td-rol" value="" name="mpm_custom_array_field[0][key2]"></td>
                    <td><button type="button" style="display: flex;align-items: center;" id="remove-row" style="display:flex;aligm-items:center" class="button button-primary td-delete"><span class="dashicons dashicons-trash"></span>&nbsp;Remove</button></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <p>
        <button type="button" style="display: flex;align-items: center;" class="button" id="add-row"><span class="dashicons dashicons-insert"></span>&nbsp;Add Item</button>
    </p>
</div>