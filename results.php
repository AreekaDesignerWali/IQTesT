<?php
session_start();
$score = isset($_SESSION['score']) ? $_SESSION['score'] : 0;
$max_score = count($_SESSION['questions']);
$iq_score = round(($score / $max_score) * 100) + 50; // Simple IQ scaling
$feedback = $iq_score >= 100 ? "Excellent cognitive abilities! You excel in logical reasoning and pattern recognition." : "Good effort! Consider practicing more on logical puzzles to boost your skills.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IQ Test - Results</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        body {
            background: linear-gradient(135deg, #047857, #10b981);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        .result-container {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 15px;
            padding: 30px;
            max-width: 600px;
            width: 100%;
            text-align: center;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(12px);
        }
        h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .score {
            font-size: 3em;
            color: #ffde59;
            margin-bottom: 20px;
        }
        .feedback {
            font-size: 1.2em;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        .btn {
            padding: 15px 30px;
            font-size: 1.2em;
            background: #ff6f61;
            border: none;
            border-radius: 25px;
            color: #fff;
            cursor: pointer;
            margin: 10px;
            transition: transform 0.3s;
        }
        .btn:hover {
            transform: scale(1.05);
        }
        @media (max-width: 600px) {
            h2 {
                font-size: 2em;
            }
            .score {
                font-size: 2.5em;
            }
            .feedback {
                font-size: 1em;
            }
            .btn {
                padding: 10px 20px;
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <div class="result-container">
        <h2>Your IQ Test Results</h2>
        <div class="score"><?php echo $iq_score; ?></div>
        <div class="feedback"><?php echo $feedback; ?></div>
        <button class="btn" onclick="retakeTest()">Retake Test</button>
        <button class="btn" onclick="shareResults()">Share Results</button>
    </div>
    <script>
        function retakeTest() {
            window.location.href = 'quiz.php';
        }
        function shareResults() {
            alert('Share your score: <?php echo $iq_score; ?>! Visit our site to take the IQ test!');
        }
    </script>
</body>
</html>
