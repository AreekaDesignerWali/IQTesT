<?php
session_start();
require_once 'db.php';

// Initialize session variables if not set
if (!isset($_SESSION['current_question'])) {
    $_SESSION['current_question'] = 0;
}
if (!isset($_SESSION['answers'])) {
    $_SESSION['answers'] = [];
}

// Fetch questions
$query = "SELECT * FROM questions LIMIT 10";
$result = mysqli_query($conn, $query);
$questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
$_SESSION['questions'] = $questions;

// Check if there are questions
if (empty($questions)) {
    die("No questions found in the database.");
}

// Get current question
$current_question_index = $_SESSION['current_question'];
if ($current_question_index >= count($questions)) {
    header('Location: result.php');
    exit();
}
$current_question = $questions[$current_question_index];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IQ Test - Quiz</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        body {
            background: linear-gradient(135deg, #6b7280, #111827);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        .quiz-container {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 15px;
            padding: 30px;
            max-width: 700px;
            width: 100%;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(12px);
        }
        h2 {
            font-size: 2em;
            margin-bottom: 20px;
            text-align: center;
        }
        .question {
            font-size: 1.3em;
            margin-bottom: 20px;
        }
        .options {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .option {
            padding: 15px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .option:hover {
            background: rgba(255, 255, 255, 0.3);
        }
        input[type="radio"] {
            margin-right: 10px;
        }
        .submit-btn {
            margin-top: 20px;
            padding: 15px 30px;
            font-size: 1.2em;
            background: #34d399;
            border: none;
            border-radius: 25px;
            color: #fff;
            cursor: pointer;
            display: block;
            margin-left: auto;
            transition: transform 0.3s;
        }
        .submit-btn:hover {
            transform: scale(1.05);
        }
        .submit-btn:disabled {
            background: #9ca3af;
            cursor: not-allowed;
        }
        @media (max-width: 600px) {
            .quiz-container {
                padding: 20px;
            }
            h2 {
                font-size: 1.5em;
            }
            .question {
                font-size: 1.1em;
            }
            .submit-btn {
                padding: 10px 20px;
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <div class="quiz-container">
        <h2>IQ Test - Question <?php echo $current_question_index + 1; ?> of <?php echo count($questions); ?></h2>
        <form id="quiz-form" method="POST" action="process.php">
            <div class="question"><?php echo htmlspecialchars($current_question['question_text']); ?></div>
            <div class="options">
                <div class="option">
                    <input type="radio" name="answer" value="1" id="option_a" required>
                    <label for="option_a"><?php echo htmlspecialchars($current_question['option_a']); ?></label>
                </div>
                <div class="option">
                    <input type="radio" name="answer" value="2" id="option_b" required>
                    <label for="option_b"><?php echo htmlspecialchars($current_question['option_b']); ?></label>
                </div>
                <div class="option">
                    <input type="radio" name="answer" value="3" id="option_c" required>
                    <label for="option_c"><?php echo htmlspecialchars($current_question['option_c']); ?></label>
                </div>
                <div class="option">
                    <input type="radio" name="answer" value="4" id="option_d" required>
                    <label for="option_d"><?php echo htmlspecialchars($current_question['option_d']); ?></label>
                </div>
            </div>
            <button type="submit" class="submit-btn" id="submit-btn">Next</button>
        </form>
    </div>
    <script>
        // Ensure an answer is selected before enabling the submit button
        document.addEventListener('DOMContentLoaded', function() {
            const submitBtn = document.getElementById('submit-btn');
            const radioButtons = document.getElementsByName('answer');
            
            // Disable submit button by default
            submitBtn.disabled = true;

            // Enable submit button when an answer is selected
            radioButtons.forEach(radio => {
                radio.addEventListener('change', () => {
                    submitBtn.disabled = false;
                });
            });

            // Prevent form submission if no answer is selected
            document.getElementById('quiz-form').addEventListener('submit', function(e) {
                if (!document.querySelector('input[name="answer"]:checked')) {
                    e.preventDefault();
                    alert('Please select an answer before proceeding.');
                }
            });
        });
    </script>
</body>
</html>
