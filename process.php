<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['answer'])) {
    $answer = (int)$_POST['answer'];
    $current_question = $_SESSION['current_question'];
    $questions = $_SESSION['questions'];

    // Store answer
    $_SESSION['answers'][$current_question] = $answer;

    // Check if answer is correct
    if ($answer === $questions[$current_question]['correct_option']) {
        $_SESSION['score'] = isset($_SESSION['score']) ? $_SESSION['score'] + 1 : 1;
    }

    // Move to next questiona$_SESSION['current_question']++;

    // Redirect to quiz or result page
    if ($_SESSION['current_question'] < count($questions)) {
        header('Location: quiz.php');
    } else {
        header('Location: result.php');
    }
    exit();
}
?>
