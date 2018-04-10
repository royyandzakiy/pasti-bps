<!------ Include the above in your HEAD tag ---------->
<link href="css/radio_button_questions.css" rel="stylesheet" >

<form action="scoring.php" method="post" name="pretest" id="pretest">
<div class="col-md-12">
<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION['test_datetime_start'] = date('m/d/Y h:i:s a', time());

    $query = "SELECT id_konsep, id_topik, id_test, id_question, weight, question, correct, A, B, C, D FROM pretest";
    $result = $con->query($query);

    $rows = array();
    while($row = $result->fetch(PDO::FETCH_NUM)) {
        array_push($rows, $row);
    }
    
    shuffle($rows);
    
    $num = 0;
    $letters = array('a','b', 'c', 'd');
    foreach ($rows as $row) {        
        echo ('
        <h5 class="question">'. '<span class="label label-primary">'.++$num.'</span> ' . $row[5].'</h5>
        ');

        $id_test = ($row[2] < 10 ? '0'.$row[2] : $row[2]);
        $id_question = ($row[2] < 10 ? '0'.$row[3] : $row[3]);
        
        $answers = [$row[7], $row[8], $row[9], $row[10]];
        shuffle($answers);
        $j = 0;
        foreach ($answers as $answer) {
            echo ('
            <div class="funkyradio">
            <div class="funkyradio-primary">
            <input type="radio" name="q-'.$id_test.$id_question.'" id="q-'.$id_test.$id_question.'-'.$letters[$j].'" value="'.$answer.'" '.($j == 0 ? "checked" : "").'/>
            <label for="q-'.$id_test.$id_question.'-'.$letters[$j].'">'.$letters[$j].'. '.$answer.'</label>
            </div>
            ');
            $j++;
        }
        
        echo ('</div>');
    }    
?>
</div>
<button for="pretest" type="submit" class="btn btn-primary btn-block">Selesai</button>
</form>