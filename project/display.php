<?php
$host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "student_db";

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID parameter exists in URL
if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    // Fetch the specific user record
    $stmt = $conn->prepare("SELECT * FROM registrations WHERE student_id = ?");
    $stmt->bind_param("s", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
    } else {
        echo "No record found.";
        exit();
    }
    $stmt->close();
} else {
    echo "Invalid Request.";
    exit();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .details-container {
            background: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 500px;
        }
        .success-badge {
            background-color: #28a745;
            color: white;
            text-align: center;
            padding: 8px;
            border-radius: 4px;
            margin-bottom: 20px;
            font-weight: bold;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 24px;
        }
        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        table th {
            color: #666;
            font-weight: 600;
            width: 40%;
        }
        table td {
            color: #333;
        }
        .btn-back {
            display: inline-block;
            text-align: center;
            width: 100%;
            padding: 12px;
            background-color: #4a90e2;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .btn-back:hover {
            background-color: #357abd;
        }
    </style>
</head>
<body>

<div class="details-container">
    <div class="success-badge">Registration Successful!</div>
    <h2>Submitted Details</h2>
    
    <table>
        <tr>
            <th>Full Name:</th>
            <td><?php echo htmlspecialchars($student['student_name']); ?></td>
        </tr>
        <tr>
            <th>Father's Name:</th>
            <td><?php echo htmlspecialchars($student['father_name']); ?></td>
        </tr>
        <tr>
            <th>Student ID:</th>
            <td><?php echo htmlspecialchars($student['student_id']); ?></td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><?php echo htmlspecialchars($student['email']); ?></td>
        </tr>
    </table>

    <a href="index.php" class="btn-back">Register Another Student</a>
</div>

</body>
</html>