<?php
require_once "conn.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $day = $_GET["day"];
    $report = $_POST[$day];
    $week_id = $_GET["week_id"];
    $user_id = $_GET["user_id"];
    if (empty($day) OR empty($report) OR empty($week_id)) {
        echo "some inputs are missing.";
        return;
    }

    $stmt = $conn->prepare("UPDATE `weekly_report` SET `$day` = CASE WHEN `$day` IS NULL THEN ? ELSE `$day` END WHERE `id` = ? AND `user_id` = ?");
     if (!$stmt) {
        $error = $conn->error;
        echo "Error saving report: An unexpected error occurred. Please try again later.";
        return;
    }

    
    $stmt->bind_param("sii", $report, $week_id, $user_id);
    if ($stmt->execute()) {
        echo "Report saved successfully!";
    } else {
        $error = $stmt->error;
        error_log("Error executing SQL statement: " . $error);
        echo "Error saving report: An unexpected error occurred. Please try again later.";
    }
    
    $stmt->close();

}
else {
    echo "Invalid request method.";
}
