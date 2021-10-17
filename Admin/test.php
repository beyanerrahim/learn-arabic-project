<?php
session_start();
error_reporting(false);

$pageTitle = 'test';
include 'init.php';
include './database.php';
$examname = $_SESSION['examname'];
//echo $examname;
?>

<div class="container">
    <section class="exam-section">

        <div class="container">
            <div class="exam-content">
                <form action="test.php" method="POST">
                    <input type="hidden" class="forlessonid" id=" form-control " name="quid" value="<?php echo  $beforupdateid; ?>" style="width: 65%;">
                    <label class="my-2 "> Exam name :</label>
                    <select name="exams" value="" id="" class="selectoption">
                        <option hidden> select exam</option>
                        <?php $exams = mysqli_query($con, "SELECT * FROM exams");
                        if (mysqli_num_rows($exams) == 0) {
                            echo "Error:No exams founded";
                        } else {
                            while ($exam = mysqli_fetch_array($exams)) {
                                echo "<option value=" . $exam['exam_id'] . ">" . $exam['exam_name'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                    <br>
                    <button type="submit" name="insertque" class="btn btn-success my-3">select questions</button>

                    <?php

                    if (isset($_POST["insertque"])) {
                        $examid = $_POST['exams'];

                        $result = mysqli_query($con, "SELECT * FROM questions where exam_id='$examid'");
                        $nums = mysqli_num_rows($result);

                        while ($res = mysqli_fetch_array($result)) {





                    ?>

                            <p>Question : <?php echo $res['question'];  ?></p>
                            <input type="radio" name="op1" value="A">
                            <label for="age1"><?php echo "A)" . $res['answer_A']; ?></label><br>
                            <input type="radio" id="age2" name="op2" value="B">
                            <label for="age2"><?php echo "B)" . $res['answer_B']; ?> </label><br>
                            <input type="radio" id="age3" name="op3" value="C">
                            <label for="age3"><?php echo "C)" . $res['answer_C']; ?></label><br><br>



                        <?php
                        } ?>

                </form>

                <div>
                    <button type="submit" name="insertque" class="btn btn-success my-3">save</button>

                </div>
            <?php } ?>
            </div>
        </div>

    </section>
</div>