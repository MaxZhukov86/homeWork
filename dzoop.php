<?php

    interface IQuestion{
        public function ShowQuestion();
    }


    abstract class CQuestion{
        public $questions;
        public $answer;

        public function __construct($questions){
            $this->questions = $questions;
        }

        abstract public function ShowQuestion();
        abstract  public function checkAnswer($question, $answer);
    }

    class CAnyAnswer extends CQuestion{

        public function ShowQuestion(){
            $size = count($this->questions) - 1;
            $index = rand(0, $size);
            return $index;
        }
        
        public function checkAnswer($idQuestion, $idAnswer){
            if($this->questions[$idQuestion]['CHECK'] == $idAnswer){
                return true;
            }else{
                return false;
            }
        }

    }

    $arQuestion = array(
        array(
            'QUESTION' => "тут правельные ответы 5 и 8",
            'ANSWERS' => array(2, 4, 5, 6, 7, 8),
            "CHECK" => array(2, 5)
        ),
        array(
            'QUESTION' => "тут правельные ответы 1 и 2",
            'ANSWERS' => array(1, 2, 3),
            "CHECK" => array(0, 1)
        ),
        array(
            'QUESTION' => "тут правельный ответ 1",
            'ANSWERS' => array(1, 2, 3),
            "CHECK" => array(0)
        ),
        array(
            'QUESTION' => "тут правельные ответы 1 и 2 и 3",
            'ANSWERS' => array(1, 2, 3, 4, 5, 6, 7, 8),
            "CHECK" => array(0, 1, 2)
        )
    );

    $anyAnswer = new CAnyAnswer($arQuestion);
    if(!$_REQUEST['send'])
        $index = $anyAnswer->ShowQuestion();

    if($_REQUEST['send']){
        $index = $_REQUEST['question'];
        if(!$anyAnswer->checkAnswer($_REQUEST['question'], $_REQUEST['answer'])){
            echo "Ответ не верный!";
        }
    }

?>
    <form action="" method="post">
        <p><?php echo $arQuestion[$index]['QUESTION']?></p>
        <input type="hidden" name="question" value="<?php echo $index?>">
        <?php foreach($arQuestion[$index]['ANSWERS'] as $key => $question):?>
            <p>
                <input type="checkbox" name="answer[]" id="answer<?php echo $key?>" value="<?php echo $key?>">
                <label for="answer<?php echo $key?>"><?php echo $question?></label>
            </p>
        <?php endforeach?>
        <input type="submit" class="btn btn-primary" name="send" value="Проверить">
        <a href="" class="btn btn-default">Следующий вопрос</a>
    </form>