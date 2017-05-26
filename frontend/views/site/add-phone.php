<div class="form-line">
    <label class="label-name">Телефон</label>
    <?= \yii\widgets\MaskedInput::widget(
        [
            'name' => 'orgPhone[' . $index . '][]',
            'id' => 'organizations-phone' . $count,
            'options' => [
                'class' => 'input-small jsHint',
            ],

            'mask' => ['+9 (999) 999-9999', '+99(999) 999-99-99'],
        ]
    )?>

    <span class="delete-line delPhone"></span>
</div>
