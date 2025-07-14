<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IQ Test - Homepage</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }
        .container {
            text-align: center;
            max-width: 600px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        p {
            font-size: 1.2em;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        .start-btn {
            padding: 15px 30px;
            font-size: 1.2em;
            background: #ff6f61;
            border: none;
            border-radius: 25px;
            color: #fff;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .start-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4);
        }
        @media (max-width: 600px) {
            h1 {
                font-size: 2em;
            }
            p {
                font-size: 1em;
            }
            .start-btn {
                padding: 10px 20px;
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the IQ Test</h1>
        <p>Test your cognitive abilities with our carefully designed IQ test. Assess your logical reasoning, pattern recognition, and problem-solving skills. Ready to challenge your mind?</p>
        <button class="start-btn" onclick="startTest()">Start Test</button>
    </div>
    <script>
        function startTest() {
            window.location.href = 'quiz.php';
        }
    </script>
</body>
</html>
