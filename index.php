    <?php
        $is_submitted = ($_SERVER["REQUEST_METHOD"] === "POST") ? true : false;
        $errors = [];

        if ($is_submitted) {
            $name = $_POST["name"] ?? "";
            $email = $_POST["email"] ?? "";
            $website = $_POST["website"] ?? "";
            $gender = $_POST["gender"] ?? "NA" ;
            $status = $_POST["status"] ?? "";
            $comment = $_POST["comment"] ?? "";
            $terms = isset($_POST["terms"]) ? true : false;

            if ($name === "") {
                $errors[] = "Please enter a name.";
            } elseif (strlen($name) <= 3){
                $errors[] = "The name must be at least 3 chars.";
            }
            if ($email === "") {
                $errors[] = "Please enter an email.";
            } 
            if ($website === "") {
                $errors[] = "Please enter an website.";
            } 
            if ($comment === "") {
                $errors[] = "Please enter your comment.";
            }
            if ($gender === "NA") {
                $errors[] = "Please select a gender.";
            } 
            if (!$terms) {
                $errors[] = "You should accept the terms to continue.";
            }
    
        }

       
        if (count($errors) > 0) {
            $is_submitted = false;
        }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="/style.css">
    </head>
    <body>

    <?php
        if (!$is_submitted) : 
    ?>

        <form class="container" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <h1>Comment Form</h1>

            <?php
                if(count($errors) > 0) :
            ?>
            <div class="warnings">
                <?php
                    foreach($errors as $error) {
                        
                ?>

                        <p><?php echo $error ?></p>
                <?php

                    }
                ?>
            </div>

            <?php
                endif
            ?>

            <div class="field-wrapper">
                <label for="name">Name: </label>
                <input type="text" name="name" class="text-input" >
            </div>
            <div class="field-wrapper">
                <label for="email">E-mail: </label>
                <input type="email" name="email" class="text-input" >
            </div>
            <div class="field-wrapper">
                <label for="website">Website: </label>
                <input type="text" name="website" class="text-input" >
            </div>
            <div class="field-wrapper">
                <label for="comment">Comment: </label>
                <textarea name="comment" class="text-input" cols="10" ></textarea>
            </div>
            <div class="field-wrapper">
                <label for="status">Status: </label>
                <select name="status">
                    <option value="Not Important">Not Important</option>
                    <option value="Madium">Medium</option>
                    <option value="Important">Important</option>
                </select>
            </div>
            <div class="radio-wrapper">
                <p>Gender: </p>
                <div class="options-wrapper">
                    <div>
                        <label for="male">Male</label>
                        <input type="radio" name="gender" value="male" id="male" >
                    </div>
                    <div>
                        <label for="female">Female</label>
                        <input type="radio" name="gender" value="female" id="female" >
                    </div>
                </div>
            </div>
            <div class="checkbox-wrapper">
                <input type="checkbox" value="accepted" name="terms" id="terms" >
                <label for="terms">I accept the terms.</label>
            </div>

            <button type="submit">Submit</button>
        </form>


    <?php 
        else :
    ?>

        <table class="user-info">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Website</th>
                    <th>Gender</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php
                        echo $_POST['name']
                    ?></td>
                    <td><?php
                        echo $_POST['email']
                    ?></td>
                    <td><?php
                        echo $_POST['website']
                    ?></td>
                    <td><?php
                        echo $_POST['gender']
                    ?></td>
                    <td><?php
                        echo $_POST['status']
                    ?></td>
                </tr>
            </tbody>
        </table>

        <table class="comment-table">
            <thead>
                <tr>
                    <th>Comment</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> <?php
                        echo $_POST['comment']
                    ?> </td>
                </tr>
            </tbody>
        </table>

    <?php
        endif
    ?>



    </body>
    </html>