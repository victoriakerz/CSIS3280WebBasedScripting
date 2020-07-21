<?php
class Page  {

    public static $title = "PDO CRUD!";

    static function header()   { ?>
        <!-- Start the page 'header' -->
        <!DOCTYPE html>
        <html>
            <head>
                <title></title>
                <meta charset="utf-8">
                <meta name="author" content="Victoria">
                <title><?php echo "Lab 07: PDO CRUD - Anna Victoria Kerz - 300292572"; ?></title>
                <link href="css/styles_001.css" rel="stylesheet">     
            </head>
            <body>
                <header>
                    <h1><?php echo "Lab 07: PDO CRUD with DAO - Anna Victoria Kerz - 300292572"; ?></h1>
                </header>
                <article>
    <?php }

    static function footer()   { ?>
        <!-- Start the page's footer -->            
                </article>
            </body>
        </html>
    <?php }

    static function listFeedbacks(Array $feedbacks)    {
    ?>
        <!-- Start the page's show data form -->
        <section class="main">
        <h2>Current Data</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>             <!-- Feedback ID -->
                    <th>Full Name</th>      <!-- $FullName -->
                    <th>Date of Birth</th>  <!-- $DOB -->
                    <th>Terms</th>          <!-- $NumberOfTerms -->
                    <th>Department</th>     <!-- $DeptID -->
                    <th>Edit</th>
                    <th>Delete</th>>
            </thead>
            <?php

                //List all the feedbacks
                $i = 1;
                foreach($feedbacks as $feedback)  {
                    if($i % 2 != 0){
                        echo '<tr>';
                    }
                    else{
                        echo '<tr class="evenRow">';
                    }
                    echo '<td>' .$feedback->getFeedbackID(). '</td>';
                    echo '<td>' .$feedback->getFullName(). '</td>';
                    echo '<td>' .$feedback->getDOB(). '</td>';
                    echo '<td>' .$feedback->getNumberOfTerms(). '</td>';
                    echo '<td>' .$feedback->getDeptName(). '</td>';
                    echo '<td><a href="'.$_SERVER["PHP_SELF"].'?action=edit&id='.$feedback->getFeedbackID().'">
                        Edit</a></td>';
                    echo '<td><a href="?action=delete&id='.$feedback->getFeedbackID().'">Delete</td>';
                    echo "</tr>";
                    $i++;
                }
        echo '</table>
            </section>';
  
    }

    static function createFeedbackForm(Array $departments)   { ?>        
        <section class="form1">
                <h2>Create Feedback</h2>
                <form action="" method="post">
                    <table>
                        <tr>
                            <td>Full Name</td>
                            <td><input type="text" name="fullName"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email"></td>
                        </tr>                        
                        <tr>
                            <td>Date of Birth</td>
                            <td><input type="date" name="dob"></td>
                        </tr>
                        <tr>
                            <td>Terms</td>
                            <td><input type="number" min="1" max="7" step="1" name="terms"></td>
                        </tr>
                        <tr>
                            <td>Department</td>
                            <td>
                            <select name="deptID">
                            <?php
                                foreach ($departments as $department)   {
                                    // list all department short names from the database read
                                    echo '<option value='.$department->getDeptID().'>'.$department->getShortName().'</option>';
                                }
                            ?>
                            </select>
                            </td>

                        </tr>
                    </table>
                    <!-- Use input type hidden to let us know that this action is to create -->
                    <input type="hidden" name="action" value="create">
                    <input type="submit" value="Add Feedback">
                </form>
            </section>

    <?php }

    static function editFeedbackForm(Feedback $feedbackToEdit, Array $departments)   {  ?>
        <section class="form1">
            <h2>Edit Feedback - <?php echo $_GET['id'] ?></h2>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                <table>
                    <tr>
                        <td>Feedback ID</td>
                        <td><?php $_GET['id'] ?></td>
                    </tr>
                    <tr>
                        <td>Full Name</td>
                        <td><td><input type="text" name="fullName" value="<?php $feedbackToEdit->getFullName() ?>" </td>
                    </tr>
                    <tr>
                        <td>Date of Birth</td>
                        <td><td><input type="date" name="dob" value="<?php $feedbackToEdit->getDOB() ?>" </td>
                    </tr>
                    <tr>
                        <td>Terms</td>
                        <td><input type="number" min="1" max="7" step="1" name="terms"> <?php $feedbackToEdit->getNumberOfTerms() ?></td>
                    </tr>

                    <tr>
                        <td>Department</td>
                        <td>
                        <select name="deptID">
                        <?php
                            foreach ($departments as $department)   {
                                if($department->getDeptID() == $feedbackToEdit.getDeptID()){
                                    echo '<option value='.$department.getDeptID().' selected>'.$department.getShortName($department.getDeptID()).'</option';
                                }
                                else{
                                    echo '<option value='.$department.getDeptID().'>'.$department.getShortName($department->getDeptID()).'</option';
                                }
                            }
                        ?>
                        </select>
                        </td>
                    </tr>
                </table>
                <!-- We need another hidden input for feedback id here. Why? -->
                <input type="hidden" name="feedbackid" value="<?php echo $_GET['id'] ?>">
                
                <!-- Use input type hidden to let us know that this action is to edit -->
                <input type="hidden" name="action" value="edit">
                <input type="submit" value="Edit Feedback">                
            </form>
        </section>
<?php }

}