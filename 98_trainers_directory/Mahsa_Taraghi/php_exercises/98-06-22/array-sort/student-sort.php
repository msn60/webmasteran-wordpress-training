<style>
   table, th,td{
        border: 1px solid #ff86b2;
        border-collapse: collapse;
        padding: 5px;

    }

</style>
<?php
$students = [
    ['name' => 'John',
        'lessons' => [
            'history_number' => 18,
            'mathematics_number' => 17.25
        ]

    ],
    [
        'name' => 'Emily',
        'lessons' => [
            'history_number' => 19,
            'mathematics_number' => 16.25
        ]

    ],
    [
        'name' => 'Sam',
        'lessons' => [
            'history_number' => 18.5,
            'mathematics_number' => 20
        ]

    ],
    [
        'name' => 'David',
        'lessons' => [
            'history_number' => 16,
            'mathematics_number' => 19
        ]

    ],
    [
        'name' => 'Katrina',
        'lessons' => [
            'history_number' => 17,
            'mathematics_number' => 18.75
        ]

    ]

];

echo '<b>'.'before sorting'.'</b>';
echo '<hr>';
print_arr($students);
function history_score_sort($stu1, $stu2)
{
    $hist_numb1 = $stu1['lessons']['history_number'];
    $hist_numb2 = $stu2['lessons']['history_number'];
    if ($hist_numb1 == $hist_numb2) {
        return 0;
    }
    return ($hist_numb1 > $hist_numb2) ? 1 : -1;


}

usort($students, 'history_score_sort');
//var_dump($students);
echo '<hr>';
echo '<b>'.'sorted by history score (ascending)'.'</b>';
echo '<hr>';
print_arr($students);

function mathematic_score_sort($stu1, $stu2)
{
    $math_numb1 = $stu1['lessons']['mathematics_number'];
    $math_numb2 = $stu2['lessons']['mathematics_number'];
    if ($math_numb1 == $math_numb2) {
        return 0;
    }
    return ($math_numb2 > $math_numb1) ? 1 : -1;
}

echo '<hr>';
usort($students, 'mathematic_score_sort');
//var_dump($students);
echo '<b>'.'sorted by mathematics score (descending)'.'</b>';
echo '<hr>';
print_arr($students);

function name_sort($stu1, $stu2)
{
    if ($stu2['name'] == $stu1['name']) {
        return 0;
    }
    return ($stu1['name'] > $stu2['name']) ? 1 : -1;
}

usort($students, 'name_sort');
echo '<hr>';
echo '<b>'.'sorted by name'.'</b>';
echo '<hr>';
print_arr($students);

echo '<hr>';
//var_dump($students);
function print_arr($main_arr){?>
    <table>
    <tr>
    <th>Name</th>
    <th>History Score</th>
    <th>Mathematics Score</th>
    </tr>
    <?php
    foreach ($main_arr as $arr):
    ?>
                <tr>
<?php
    foreach ($arr as $key=>$value):?>


           <?php
           if(!is_array($value)){ ?>
               <td><?php echo $value?></td>
           <?php
           }
           else{
               foreach ($value as $keyv=>$valuev):?>
               <td><?php echo $valuev?></td>
               <?php endforeach; ?>

            <?php
           }
            ?>
    <?php endforeach;?>

        </tr>
    <?php endforeach;?>


</table>
<?php }
?>

