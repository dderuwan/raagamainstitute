<?php
require '../../Databsase/connection.php'; // Correct the spelling in your actual file path

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $assignmentId = $_POST['assignment_id'] ?? null;
    error_log("Assignment ID: $assignmentId");
    $courseId = $_POST['course_id'];
    $teacherId = $_SESSION['id'];
    $assignmentTitle = $_POST['assignment_title'];
    $assignmentName = $_POST['assignment_name'];
    $assignmentMarks = $_POST['assignment_marks'];

    $uploadDir = './uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileUploaded = $_FILES['assignment_file']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['assignment_file']['tmp_name']);
    if ($fileUploaded) {
        $fileName = $_FILES['assignment_file']['name'];
        $tempName = $_FILES['assignment_file']['tmp_name'];
        $uploadPath = $uploadDir . basename($fileName);
    
        // Read and encode the file content BEFORE moving it
        $pdfContent = file_get_contents($tempName);
        $pdfBase64 = base64_encode($pdfContent);
    
        if (move_uploaded_file($tempName, $uploadPath)) {
            $fileNameToStore = basename($fileName);
    
            // Prepare SQL based on whether we're updating or inserting
            if ($assignmentId) {
                error_log("Attempting to update assignment with ID: $assignmentId");
                // Update existing assignment
                $sql = "UPDATE assignments SET course_id=?, assignment_title=?, assignment_name=?, assignment_marks=?, pdf_base64=?, file_name=? WHERE id=? AND teacher_id=?";
                $params = [$courseId, $assignmentTitle, $assignmentName, $assignmentMarks, $pdfBase64, $fileNameToStore, $assignmentId, $teacherId];
                $param_type = "iisssiii"; // Check these types are correct and match the expected types in your database
            } else {
                error_log("Attempting to insert a new assignment");
                // Insert new assignment
                $sql = "INSERT INTO assignments (teacher_id, course_id, assignment_title, assignment_name, assignment_marks, pdf_base64, file_name) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $params = [$teacherId, $courseId, $assignmentTitle, $assignmentName, $assignmentMarks, $pdfBase64, $fileNameToStore];
                $param_type = "iisssss"; // Check these types
            }
            
    
            if ($stmt = $connection->prepare($sql)) {
                $stmt->bind_param($param_type, ...$params); // Spread operator to pass array elements as individual arguments
                $stmt->execute();
                if ($stmt->affected_rows > 0) {
                    echo "Assignment uploaded successfully.";
                } else {
                    echo "Failed to upload assignment.";
                }
                $stmt->close();
            } else {
                echo "Failed to prepare the SQL statement: " . $connection->error;
            }
            
        } else {
            echo "Failed to move uploaded file.";
        }
    } 
    else {
        echo "File upload error: " . $_FILES['assignment_file']['error'];
    }
    
} else {
    echo "Invalid request method.";
}
?>
