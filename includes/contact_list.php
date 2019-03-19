<html lang="en">
    <head>
        <title> Contact List </title>
        <style>
            table{

                font-family: sans-serif;
                width: 100%;
                color: #212529;
                //font-size: 25px;
                text-align: center;
            }
            th{
                background-color: #212529;
                color: white;
            }
            tr:nth-child(even) {background-color: #f2f2f2}
        </style>
    </head>
    <body>
        <section class="contact py-5">
    <div class="container py-sm-3">
        <h3 class="heading text-capitalize mb-lg-5 mb-4"> Contact Us List- <span>Get In Touch</span> </h3>
       
    </div>
            <div class="container py-5"> <table>
                    <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Mobile No.</th>
                <th>Message</th>
                <th>Resource</th>
                <th width="100px">Action</th>
            </tr>
                    </thead>
            <?php
            $conn = new mysqli("localhost", "root", "test123", "form");
            if ($conn->connect_error) {
                die("Connection Failed" . $conn->connect_error);
            }
            $query = "SELECT fname ,mobile ,lname ,email ,details ,opt,id from contact";
            $result = $conn->query($query);
            //if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
            
                <tr id="<?php echo $row['id'] ?>">
                <td><?php echo $row['fname'] ?></td>
                <td><?php echo $row['lname'] ?></td>
                <td><?php echo $row['details'] ?></td>
                <td><?php echo $row['opt'] ?></td>
                <td><?php echo $row['mobile'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><button class="btn btn-danger btn-sm remove">Delete</button></td>
            </tr>


        <?php } ?>


    </table>

          
            
    </div>
            </body>
            <script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: 'controllers/delete.php',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+id).remove();
                    alert("Record removed successfully");  
               }
            });
        }
    });


</script>

</html>