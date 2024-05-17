<?php get_header() ?>
<div class="card">

    <div class="card-header d-flex flex-grow-1 align-items-center">
        <p class="h4 m-0"><?= __('crud.label.create') ?> <?php get_title() ?> - <?= $period_name->name; ?></p>
        <div class="right-button ms-auto">
            <a href="<?= routeTo('crud/index?table=payroll_periods_users&',['filter'=>['period_id' => $period_name->id]])?>" class="btn btn-warning btn-sm">
                <?= __('crud.label.back') ?>
            </a>
         
        </div>
    </div>
    <div class="card-body">
        <?php if ($error_msg) : ?>
            <div class="alert alert-danger"><?= $error_msg ?></div>
        <?php endif ?>
        <table class="table table-bordered  mb-3" style="width:100%">
            <tr>
                <th>Name</th>
                <th>Salary</th>
                <th>Note</th>
                <th width="50px"> <input type="checkbox" onchange="checkAll(this)" class="form-check-input" alt="Checkbox" value="Pilih Semua" data-checkbox-all="checklistAll">
                </th>
            </tr>
            <form action="" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <?php foreach ($users as $key => $value) : ?>
                    <tr>
                        <td><?= htmlspecialchars($value->user_name, ENT_QUOTES, 'UTF-8'); ?></td>
                        <input type="hidden" name="period_id" value="<?=$period_name->id;?>">
                        <input type="hidden" name="user_id[<?=$value->user_id;?>]" value="<?=$value->user_id;?>">
                        <td>
                            <input type="number" class="form-control" name="salary[<?=$value->user_id;?>]" value="">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="note[<?=$value->user_id;?>]" value="">
                        </td>
                        <td>
                            <input type="checkbox" class="form-check-input" name="status[<?=$value->user_id;?>]" value="Sudah Di Bayar">
                        </td>
                    </tr>
                <?php endforeach; ?>
        </table>
        <button class="btn btn-primary" type="submit">Simpan</button>
        </form>

        <!-- <form action="" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <?php
            foreach ($fields as $key => $field) :
                $label = $field;
                $type  = "text";
                $attr  = ['class' => "form-control"];
                if (is_array($field)) {
                    $field_data = $field;
                    $field = $key;
                    $label = $field_data['label'];
                    if (isset($field_data['type'])) {
                        $type  = $field_data['type'];
                    }

                    if (isset($field_data['attr'])) {
                        $attr = array_merge($attr, $field_data['attr']);
                    }
                }
                $label = _ucwords($label);
                $fieldname = $type == 'file' ? $field : $tableName . "[" . $field . "]";
                $attr = array_merge($attr, ["placeholder" => $label, "value" => $old[$field] ?? '']);
                if (isset($attr['multiple'])) {
                    $fieldname .= "[]";
                }
            ?>
            <div class="form-group mb-3">
                <label class="mb-2"><?= $label ?></label>
                <?= \Core\Form::input($type, $fieldname, $attr) ?>
            </div>
            <?php endforeach ?>
            <div class="form-group">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form> -->
    </div>
</div>


<?php get_footer() ?>
<script>
    function checkAll(ele) {
        var checkboxes = document.getElementsByTagName('input');
        if (ele.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = true;
                }
            }
        } else {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = false;
                }
            }
        }
    }
</script>