<!------ Include the above in your HEAD tag ---------->
<link href="css/radio_button_questions.css" rel="stylesheet" >

<form action="scoring.php" method="post" name="pertayaantes" id="pertayaantes">
<div class="col-md-12">
<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION['test_datetime_start'] = date('m/d/Y h:i:s a', time());
    $current_konsep = $_SESSION['konsep_aktif'];

    $query = "SELECT id_konsep, id_topik, id_test, id_question, weight, question, correct, A, B, C, D FROM " . $test_type;
    $result = $con->query($query);

    $rows = array();
    while($row = $result->fetch(PDO::FETCH_NUM)) {
        $row_konsep = $row[0];
        if ( ($test_type == 'pertayaantes' && $row_konsep == $current_konsep) || $test_type == 'pretest') {
            array_push($rows, $row);
        }
    }
    
    shuffle($rows);
    
    $num = 0;
    $letters = array('a','b', 'c', 'd');
    foreach ($rows as $row) {        
        $id_test = ($row[2] < 10 ? '0'.$row[2] : $row[2]);
        $id_question = ($row[2] < 10 ? '0'.$row[3] : $row[3]);

        echo ('
        <h5 class="question" id="question-'.$id_test.$id_question.'">'. '<span class="label label-primary">'.++$num.'</span> ' . $row[5].'</h5>
        ');

        
        $answers = [$row[7], $row[8], $row[9], $row[10]];
        shuffle($answers);
        $j = 0;

        echo ('<div class="funkyradio">');
        foreach ($answers as $answer) {
            echo ('
            <div class="funkyradio-primary">
            <input type="radio" name="q-'.$id_test.$id_question.'" class="q-'.$id_test.$id_question.'" id="q-'.$id_test.$id_question.'-'.$letters[$j].'" value="'.$answer.'" />
            <label for="q-'.$id_test.$id_question.'-'.$letters[$j].'">'.$letters[$j].'. '.$answer.'</label>
            </div>
            ');
            $j++;
        }
        
        echo ('</div>');
    }
    
    // javascript
    echo('<script id="answer_click_listener">');

    $jumlah_soal = 0;
    foreach ($rows as $row) {        
        $id_test = ($row[2] < 10 ? '0'.$row[2] : $row[2]);
        $id_question = ($row[2] < 10 ? '0'.$row[3] : $row[3]);

        $class_name = $id_test.$id_question;
        echo("
            $('.q-". $class_name ."').click(function(){
                $('#date-". $class_name ."').addClass('today');
            });
        ");
        $jumlah_soal++;
    }

    echo('</script>');



    echo('
    <script>
    $("#sidebar-pretest").append(\'<div class="datepicker datepicker-dropdown" style="top: 34px; left: 165.5px; display: block;"><div class="datepicker-days" style="display: block;"><table class=" table-condensed"><tbody><tr>');

    $i = 1;
    foreach ($rows as $row) {        
        $id_test = ($row[2] < 10 ? '0'.$row[2] : $row[2]);
        $id_question = ($row[2] < 10 ? '0'.$row[3] : $row[3]);

        $class_name = $id_test.$id_question;

        echo('<td class="day" id="date-'. $class_name .'"><a href="#question-'. $class_name .'">'.$i.'</a></td>');
        
        if($i % 5 == 0) {
            if($i % $jumlah_soal == 0)
                echo('</tr>');
            else
                echo('</tr><tr>');
        }
        $i++;
    }

    echo('</tbody></table></div></div>\');
    </script>
    ');
?>
</div>
<button for="pretest" type="submit" class="btn btn-primary btn-block">Selesai</button>
</form>