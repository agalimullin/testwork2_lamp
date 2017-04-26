<?php foreach ($data as $object) { ?>


    <table border='1' style='border: dashed 2px;  margin-bottom: 10px;'>
        <tr style='border: dashed 1px red'>
            <th>Email</th>
            <th>ФИО</th>
            <th>Адрес</th>
        </tr>

        <tr style='border: dashed 1px red'>
            <td><?= $object->email?></td>
            <td><?=$object->fullName?></td>
            <td><?=$object->address?></td>
        </tr>

        <tr>
            <td style='text-align: right'>Asus:</td>
            <td style='text-align: right'>20.000 x</td>
            <td><?=$object->asus?></td>
        </tr>

        <tr>
            <td style='text-align: right'>Lenovo:</td>
            <td style='text-align: right'>30.000 x</td>
            <td><?=$object->lenovo?></td>
        </tr>
        <?php $finalPrice = $object->asus * 20000 + $object->lenovo * 30000;?>
        <tr>
            <td style='text-align: right'>Итого:</td>
            <td style='text-align: right' colspan="2"><?=$finalPrice?> руб.</td>
    </table>
<?php } ?>

<a href="/testwork/form1">Хочу сделать новый заказ!</a>