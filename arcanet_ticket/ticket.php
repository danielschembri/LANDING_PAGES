<!DOCTYPE html>
<html>
    <head>
        <title>Arcanet</title>
        <link href="https://fonts.googleapis.com/css?family=Quicksand:300" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.3/jquery-confirm.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.3/jquery-confirm.min.js"></script>

        <style>
            .table{
                margin: auto;
                font-family: 'Quicksand', sans-serif;
            }
            .form_input{
                width: 120%;
                height: 15px;
                padding: 5px;
                font-family: 'Quicksand', sans-serif;
            }
            select.form_input{
                height: 29px;
                width: 129%;
            }
            .button{
                width: 118%;
                height: 30px;
                padding: 24px;
                background-color: #9787BB;
                border: none;
                line-height: 1px;
                font-size: 20px;
                font-family: 'Quicksand', sans-serif;
            }
        </style>

    </head>
    <body style="background-image: url('arcanetbg.png');background-position: top;background-size: autp;background-position: top;text-align: center;vertical-align: middle;padding-top: 1vh;font-family: 'Quicksand', sans-serif;background-repeat: no-repeat;background-color: white;">
        <?php 
            if(isset($_POST['formSubmit'])){
                $pdo = new PDO("mysql:host=172.16.0.70;dbname=arcanet;charset=utf8", "ARCANET", "vW8mnbtPb5sw9KF2", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                $query = "
                    UPDATE 
                        `arcanet`.`RegisteredTickets` 
                    SET
                        `Prenominals` = '{$_POST['txtPreNom']}',
                        `Name` = '{$_POST['txtName']}',
                        `Surname` = '{$_POST['txtSurname']}',
                        `Address` = '{$_POST['txtAddress']}',
                        `Address2` = '{$_POST['txtAddress2']}',
                        `City` = '{$_POST['txtCity']}',
                        `Region` = '{$_POST['txtRegion']}',
                        `Country` = '{$_POST['txtCountry']}',
                        `Postcode` = '{$_POST['txtPostCode']}',
                        `email` = '{$_POST['txtEmail']}',
                        `Tele` = '{$_POST['txtContactNo']}' 
                    WHERE `tableId` = '{$_POST['txtTicketNo']}' AND `Name` IS NULL ;
                ";
                $pdos = $pdo->prepare($query);
                $pdos->execute();
                $count = $pdos->rowCount();
                if($count == 1){
                    echo "<script> $.alert({ title: 'FOUND!', content: 'The ticket has been registerd', theme: 'supervan' }); </script>";
                }else{
                    echo "<script> $.alert({ title: 'NOT FOUND!', content: 'Please make sure that the ticket number is correct', theme: 'supervan' }); </script>";
                }
            } 

        ?>
    <img src="arcanet final.png" style="width: 35vh; margin: 0 auto;" />
        <form action="#" method="post">
            <table class="table">
                <tr>
                    <td>Prenominals</td>
                    <td>
                        <select name="txtPreNom" class="form_input">
                            <option>Dr.</option>
                            <option>Capt.</option>
                            <option>Ing.</option>
                            <option>Ir.</option>
                            <option>Prof.</option>
                            <option>Mr.</option>
                            <option>Hon.</option>
                            <option>Ms.</option>
                            <option>Mrs.</option>
                            <option>Miss.</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="txtName" class="form_input" required /></td>
                </tr>
                <tr>
                    <td>Surname</td>
                    <td><input type="text" name="txtSurname" class="form_input" required/></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="txtAddress" class="form_input" required/></td>
                </tr>
                <tr>
                    <td>Address 2</td>
                    <td><input type="text" name="txtAddress2" class="form_input" required/></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><input type="text" name="txtCity" class="form_input" required/></td>
                </tr>
                <tr>
                    <td>Region</td>
                    <td><input type="text" name="txtRegion" class="form_input" required/></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td><input type="text" name="txtCountry" class="form_input" required/></td>
                </tr>
                <tr>
                    <td>Postcode</td>
                    <td><input type="text" name="txtPostCode" class="form_input" required/></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="txtEmail" class="form_input" required/></td>
                </tr>
                <tr>
                    <td>Contact No</td>
                    <td><input type="text" name="txtContactNo" class="form_input" required/></td>
                </tr>
                <tr>
                    <td>Ticket No</td>
                    <td><input type="text" name="txtTicketNo" class="form_input" required/></td>
                </tr>
                <tr>
                    <td colspan="2"><button class="button" name="formSubmit">Submit</button></td>
                </tr>
            </table>
        </form>
    
    </body>
</html>