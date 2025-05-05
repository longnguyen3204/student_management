<?php

function query($pdo, $sql,$parameters = []){ // Function to execute an SQL query with optional parameters
    $query = $pdo->prepare($sql); // Prepare the SQL query
    $query->execute($parameters);  // Execute the query with the provided parameters
    return $query; // Return the query object
}

function checkMail($pdo, $email, $accountid = null) { // Function to check if an email already exists in the account table
    if ($accountid) { // If an account ID is provided, exclude it from the query
        $parameters =[':email' => $email, ':id' => $accountid]; 
        $query = query($pdo,"SELECT COUNT(*) FROM accounts WHERE email = :email AND id != :id LIMIT 1", $parameters);
    } else {
        $parameters = [':email' => $email];
        $query = query($pdo,"SELECT COUNT(*) FROM accounts WHERE email = :email LIMIT 1", $parameters);
    }
    return $query->fetchColumn(); // Return the count of rows with the specified email
}

function selectMail($pdo, $email) { // Function to retrieve a user's account details based on their email
    $parameters = [':email' => $email];
    $query = query($pdo,"SELECT * FROM accounts WHERE email = :email", $parameters);
    return $query->fetch();
}

function updatePassword($pdo, $email, $password) { // Function to update the password for a given email
    $password_hash = password_hash($password, PASSWORD_DEFAULT);  // Hash the new password
    
    $parameters = [':email' => $email ,'password_hash' => $password_hash];
    $query = query($pdo,'UPDATE accounts SET password_hash = :password_hash WHERE email = :email LIMIT 1', $parameters);
    return $query->rowCount() > 0;  // Return true if the password was updated
}   

function addStudent($pdo, $username, $email, $password) { // Function to add a new account to the database
    $password_hash = password_hash($password, PASSWORD_DEFAULT); // Hash the password

    $parameters = [':username' => $username, ':email' => $email, 'password_hash' => $password_hash];
    $query = query($pdo,"INSERT INTO accounts (username, email, password_hash, `role`) VALUES (:username,:email, :password_hash, 'student')",$parameters);
    return $query->rowCount() > 0; // Return true if the row was inserted
}

function addTeacher($pdo, $username, $email, $password) { // Function to add a new account to the database
    $password_hash = password_hash($password, PASSWORD_DEFAULT); // Hash the password

    $parameters = [':username' => $username, ':email' => $email, 'password_hash' => $password_hash];
    $query = query($pdo,"INSERT INTO accounts (username, email, password_hash, `role`) VALUES (:username,:email, :password_hash, 'teacher')",$parameters);
    return $query->rowCount() > 0; // Return true if the row was inserted
}

function getAccountbyEmail($pdo, $email) {
    $parameters = [":email"=> $email];
    $query = query($pdo,"SELECT accounts.id, accounts.username, accounts.email, accounts.gender, accounts.phone, classes.class_name FROM accounts
                                    INNER JOIN classes ON account_id = accounts.id
                                    WHERE email = :email", $parameters);
    return $query->fetchALL();
}
function getAccountbyID($pdo, $accountid) { // Function to retrieve account information by account ID
    $parameters = [':id'=> $accountid];
    $query = query($pdo, 'SELECT * FROM accounts WHERE id = :id', $parameters);
    return $query->fetch(); // Return the account information
}
function updateAccount($pdo, $accountid, $username, $email, $gender, $phone) { // Function to update account details (username, email, role) by account ID
    $parameters = [':id'=> $accountid, ':username' => $username, ':email' => $email, ':gender' =>$gender, ':phone' => $phone];
    $query = query($pdo,'UPDATE accounts SET username = :username, email = :email, gender = :gender, phone = :phone WHERE id = :id', $parameters);
    return $query->rowCount() > 0; // Return true if the account was updated
}


function deleteAccount($pdo, $accountid){ // Function to delete an account by account ID
    $parameters = [':id' =>$accountid];
    $query = query($pdo,"DELETE FROM accounts WHERE id = :id", $parameters);
    return $query->rowCount() > 0; // Return true if the account was deleted
}


function checkCourse($pdo, $course) { // Function to check if a course exists based on course name
    $parameters = [':course' => $course];
    $query = query($pdo,"SELECT COUNT(*) FROM courses WHERE course_name = :course LIMIT 1", $parameters);
    return $query->fetchColumn(); // Return the count of courses with the specified name
}

function getCoursebyID($pdo, $courseid) { // Function to get course details by course ID
    $parameters = [':id'=> $courseid];
    $query = query($pdo, 'SELECT * FROM courses WHERE id = :id', $parameters);
    return $query->fetch(); // Return the course details
}

function updateCourse($pdo, $courseid, $course) { // Function to update course name by course ID
    $parameters = [':id'=> $courseid, ':course_name' => $course];
    $query = query($pdo,'UPDATE courses SET course_name = :course_name WHERE id = :id', $parameters);
    return $query->rowCount() > 0; // Return true if the course was updated
}

function addCourse($pdo, $course) { // Function to add a new course to the system
    $parameters = [':course' => $course];
    $query = query($pdo,"INSERT INTO courses (course_name) VALUES (:course)", $parameters);
    return $query->rowCount() > 0; // Return true if the course was added successfully
}

function deleteCourse($pdo, $courseid){ // Function to delete a course by course ID
    $parameters = [':id' =>$courseid];
    $query = query($pdo,"DELETE FROM courses WHERE id = :id", $parameters);
    return $query->rowCount() > 0; // Return true if the course was deleted
}

function getNotificationforEdit($pdo, $notificationid) { // Function to get post details based on post ID
    $parameters = [':id'=> $notificationid];
    $query = query($pdo, 'SELECT notifications.id, notifications.notification_title, notifications.notification_text, notifications.notification_date FROM notifications 
                            INNER JOIN accounts on account_id = accounts.id
                            WHERE notifications.id =:id', $parameters);
    return $query->fetch(); // Return the post details
}

function getNotificationbyID($pdo, $notificationid) { // Function to get notification details based on notification ID
    $parameters = [':id'=> $notificationid];
    $query = query($pdo, 'SELECT notifications.id, notifications.notification_title, notifications.notification_text, notifications.notification_date, accounts.username FROM notifications 
                                    INNER JOIN accounts ON account_id = accounts.id
                                    WHERE notifications.id = :id', $parameters);
    return $query->fetchAll(); // Return the notification details
}

function deleteNotification($pdo, $notificationid){ // Function to delete a notification by notification ID
    $parameters = [':id' =>$notificationid];
    $query = query($pdo,"DELETE FROM notifications WHERE id = :id", $parameters);
    return $query->rowCount() > 0; // Return true if the notification was deleted
}

function addNotification($pdo, $notificationtitle, $notificationtext, $email) { // Function to add a new notification
    $parameters = [':notification_title' => $notificationtitle ,':notification_text' => $notificationtext, ':email' => $email];
    $query = query($pdo,'INSERT INTO notifications (notification_title, notification_text, notification_date, account_id)
            SELECT :notification_title, :notification_text, CURDATE(), accounts.id FROM accounts
            WHERE accounts.email = :email', $parameters);
    return $query->rowCount() > 0; // Return true if the notification was added
}

function updateNotification($pdo, $notificationid, $notificationtitle, $notificationtext) { // Function to update an existing notification
    $parameters = [':id'=> $notificationid, ':notification_title' => $notificationtitle ,':notification_text' => $notificationtext];
    $query = query($pdo,'UPDATE notifications SET notification_title = :notification_title, notification_text = :notification_text WHERE notifications.id = :id', $parameters);
    return true; // notification is updated
}

function getGradebyID($pdo, $gradeid) { // Function to get grade details based on grade ID
    $parameters = [':id'=> $gradeid];
    $query = query($pdo, 'SELECT grades.id, grades.grade, accounts.username, courses.course_name FROM grades 
                                    INNER JOIN accounts on account_id = accounts.id
                                    INNER JOIN courses on course_id = courses.id
                                    WHERE grades.id = :id', $parameters);
    return $query->fetch(); // Return the grade details
}

function deleteGrade($pdo, $gradeid){ // Function to delete a grade by grade ID
    $parameters = [':id' =>$gradeid];
    $query = query($pdo,"DELETE FROM grades WHERE id = :id", $parameters);
    return $query->rowCount() > 0; // Return true if the grade was deleted
}

function addGrade($pdo, $grade, $accountid, $courseid) { // Function to add a new grade
    $parameters = [':grade' => $grade, ':accountid' => $accountid,':courseid'=> $courseid];
    $query = query($pdo,'INSERT INTO grades (grade, account_id, course_id)
            VALUES (:grade, :accountid, :courseid)', $parameters);
    return $query->rowCount() > 0; // Return true if the grade was added
}

function updateGrade($pdo, $gradeid, $grade, $accountid, $courseid) { // Function to update an existing grade
    $parameters = [':id'=> $gradeid, ':grade' =>$grade, ':accountid' => $accountid ,':courseid' => $courseid];
    $query = query($pdo,'UPDATE grades SET grade = :grade, account_id = :accountid, course_id = :courseid WHERE id = :id', $parameters);
    return true; // grade is updated
}

function allStudent($pdo){ // Function to retrieve all accounts from the database
    $authors = query($pdo, 'SELECT * FROM accounts WHERE `role` IN ("student")');
    return $authors->fetchAll(); // Return all accounts
}

function allTeacher($pdo){ // Function to retrieve all accounts from the database
    $authors = query($pdo, 'SELECT * FROM accounts WHERE `role` IN ("teacher")');
    return $authors->fetchAll(); // Return all accounts
}

function allCourse($pdo){ // Function to retrieve all courses from the database
    $courses = query($pdo, 'SELECT * FROM courses');
    return $courses->fetchAll();  // Return all courses
}

function allNotification($pdo) { // Function to retrieve all notifications from the database
    $query = query($pdo, 'SELECT notifications.id, notifications.notification_title, notifications.notification_text, notifications.notification_date, accounts.username FROM notifications 
                                    INNER JOIN accounts ON account_id = accounts.id
                                    ORDER BY id DESC');
    return $query->fetchAll();  // Return all notifications
}

function allGrade($pdo) { // Function to retrieve all notifications from the database
    $query = query($pdo, 'SELECT grades.id, grades.grade, accounts.username, courses.course_name FROM grades
                                    INNER JOIN accounts ON  account_id = accounts.id
                                    INNER JOIN courses ON course_id = courses.id ');
    return $query->fetchAll();  // Return all notifications
}

function allGradebyEmail($pdo, $email) { // Function to retrieve all notifications from the database
    $parameters = ['email'=> $email]; 
    $query = query($pdo, 'SELECT grades.id, grades.grade, courses.course_name FROM grades
                                    INNER JOIN accounts ON  account_id = accounts.id
                                    INNER JOIN courses ON course_id = courses.id 
                                    WHERE email = :email', $parameters);
    return $query->fetchAll();  // Return all notifications
}
?>

