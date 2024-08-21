<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize the inputs
    $num1 = htmlspecialchars($_POST['num1']);
    $num2 = htmlspecialchars($_POST['num2']);
    $operation = htmlspecialchars($_POST['operation']);

    // Validate that both inputs are numeric
    if (is_numeric($num1) && is_numeric($num2)) {
        $num1 = floatval($num1);
        $num2 = floatval($num2);
        $result = null;

        // Perform the selected operation
        switch ($operation) {
            case 'add':
                $result = $num1 + $num2;
                break;
            case 'subtract':
                $result = $num1 - $num2;
                break;
            case 'multiply':
                $result = $num1 * $num2;
                break;
            case 'divide':
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    echo "Error: Division by zero is not allowed.";
                    exit;
                }
                break;
            default:
                echo "Invalid operation selected.";
                exit;
        }

        // Display the result
        echo "The result of " . $operation . " between " . $num1 . " and " . $num2 . " is: " . $result;
    } else {
        echo "Error: Both inputs must be numeric.";
    }
} else {
    echo "Error: Invalid request method.";
}

?>