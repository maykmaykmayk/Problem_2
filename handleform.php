<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECEIPT</title>
    <style>
        .message {
            border: 3px dashed #e74c3c;
            padding: 15px;
            margin: 15px 0;
            color: #e74c3c;
            text-align: center;
            font-weight: bold;
        }

        .receipt {
            border: 3px solid #2c3e50;
            padding: 20px;
            margin: 20px auto;
            width: 60%;
            background-color: #ecf0f1;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
        }

        .receipt h1 {
            text-align: center;
            color: #34495e;
            margin-bottom: 20px;
        }

        .receipt-content {
            text-align: center;
            margin-top: 10px;
            line-height: 1.6;
        }

        .receipt-content span {
            display: block;
            font-size: 1.2em;
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <?php 
    if (isset($_GET["getorder"])) {
        $Q = $_GET['Quantity'];
        $C = $_GET['Cash'];
        $O = $_GET['order'];

        if ($Q > 0 && $C > 0) {
            if ($O == "Burger") {
                $total = $Q * 50;
            } elseif ($O == "Fries") {
                $total = $Q * 75;
            } elseif ($O == "Steak") {
                $total = $Q * 150;
            } else {
                exit;
            }

            if ($C < $total) {
                echo "<div class='message'>Sorry, balance not enough.</div>";
            } else {
                echo "<div class='receipt'>";
                echo "<h1>RECEIPT</h1>";
                echo "<div class='receipt-content'>";
                echo "<span>Total Price: $total PHP</span>";
                echo "<span>YOU PAID: $C PHP</span>";
                $CH = $C - $total;
                echo "<span>CHANGE: $CH PHP</span>";

                date_default_timezone_set("Asia/Manila");
                $currentTime = date("Y/m/d H:i:sa");
                echo "<span>Date & Time: $currentTime</span>";
                echo "</div>";
                echo "</div>";
            }
        }
    }
    ?>    
</body>

</html>
