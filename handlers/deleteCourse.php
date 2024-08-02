<?php 
session_start();
    include('../Databsase/connection.php');

    if(isset($_GET['id'])){
        $courseId = $_GET['id'];

        $sql = "DELETE FROM courses WHERE id = ?";

        if($stmt = mysqli_prepare($connection, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $courseId);
            
            if(mysqli_stmt_execute($stmt)){
                header("Location:../teacher_dashboard/template/viewdetails.php");
                echo "<script>window.location.href = '../../handlers/deleteCourse.php?id=' + courseId;</script>";
            }

            else{
                echo "Error: ". mysqli_error($connection);
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($connection);
?>

<?php 
    include('../Databsase/connection.php');

    if(isset($_GET['id'])){
        $courseID = $_GET['id'];

        $deleteCourseSQL = "DELETE FROM courses WHERE id = ?";
        if($courseDeleteSTMT = mysqli_prepare($connection,$deleteCourseSQL)){
            mysqli_stmt_bind_param($courseDeleteSTMT, "i", $courseID);

            if(mysqli_stmt_execute($courseDeleteSTMT)){

                $deleteSectionSQL = "DELETE FROM sections WHERE courseID = ?";
                if($deleteSectionSTMT = mysqli_prepare($connection,$deleteSectionSQL)){
                    mysqli_stmt_bind_param($deleteSectionSTMT, "i", $courseID);

                    mysqli_stmt_execute($deleteSectionSTMT);

                    mysqli_stmt_close($deleteSectionSTMT);
                }
                else{
                    echo "Error in Deleting Sections ",mysqli_error($connection);
                }


                $deleteLessonSQL = "DELETE FROM lessons WHERE courseID = ?";
                if($deleteLessonSTMT = mysqli_prepare($connection,$deleteLessonSQL)){
                    mysqli_stmt_bind_param($deleteLessonSTMT,"i",$courseID);

                    mysqli_stmt_execute($deleteLessonSTMT);

                    mysqli_stmt_close($deleteLessonSTMT);
                }
                else{
                    echo "Error in Deleting Lessons ",mysqli_error($connection);
                }
            }
            else{
                echo "Error in Deleting Course ".mysqli_error($connection);
            }
        }

        else{
            echo "Error ". mysqli_error($connection);
        }
    }
?>