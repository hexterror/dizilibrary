<?php 
   session_start();
   include('includes/config.php');
   error_reporting(0);
   if(strlen($_SESSION['login'])==0)
       {   
   header('location:index.php');
   }
   else{ 

   if(isset($_POST['delete']))
   {    
   $email = $_POST['email'];
   $password = md5($_POST['password']);

   $sql = "SELECT EmailId,Password,StudentId,Status FROM tblstudents WHERE EmailId=:email and Password=:password";
   $query = $dbh->prepare($sql);
   $query->bindParam(':email', $email, PDO::PARAM_STR);
   $query->bindParam(':password', $password, PDO::PARAM_STR);
   $query->execute();
   $results = $query->fetchAll(PDO::FETCH_OBJ);

   if ($query->rowCount() > 0)
   {
       foreach ($results as $result)
       {
           $_SESSION['stdid'] = $result->StudentId;
           if ($result->Status == 1)
           {
            $sql = "delete from tblstudents WHERE EmailId=:email";
            $query = $dbh->prepare($sql);
            $query -> bindParam(':email',$email, PDO::PARAM_STR);
            $query -> execute();
            echo '<script>alert("Your Account has been deleted")</script>';
            $_SESSION = array();
            if (ini_get("session.use_cookies")) {
               $params = session_get_cookie_params();
               setcookie(session_name(), '', time() - 60*60,
                  $params["path"], $params["domain"],
                  $params["secure"], $params["httponly"]
               );
            }
            session_destroy(); // destroy session
            header('location:index.php');
           }
           else
           {
               echo "<script>alert('Invalid Password');</script>";
           }
       }

   }

   else
   {
       echo "<script>alert('error: somethine went wrong!');</script>";
   }
   }
   
   ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <![endif]-->
      <title>Online Library Management System | Student Signup</title>
      <!-- BOOTSTRAP CORE STYLE  -->
      <link href="assets/css/bootstrap.css" rel="stylesheet" />
      <!-- FONT AWESOME STYLE  -->
      <link href="assets/css/font-awesome.css" rel="stylesheet" />
      <!-- CUSTOM STYLE  -->
      <link href="assets/css/style.css" rel="stylesheet" />
      <!-- GOOGLE FONT -->
      <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   </head>
   <body>
      <!------MENU SECTION START-->
      <?php include('includes/header.php');?>
      <!-- MENU SECTION END-->
      <div class="content-wrapper">
         <div class="container">
            <div class="row pad-botm">
               <div class="col-md-12">
                  <h4 class="header-line">Delete Account</h4>
               </div>
            </div>
            <div class="row">
               <div class="col-md-9 col-md-offset-1">
                  <div class="panel panel-danger">
                     <div class="panel-heading text-center">
                        WARNING: All data will be lost and can never be recovered.
                     </div>
                     </br>
                     <div class="text-center">
                        <a href="my-profile.php"><button class="btn btn-primary">Go to My Profile</button></a>
                     </div>
                     <div class="panel-body">
                        <form name="signup" method="post">
                           <?php 
                              $sid=$_SESSION['stdid'];
                              $sql="SELECT StudentId,FullName,EmailId,MobileNumber,RegDate,UpdationDate,Status from  tblstudents  where StudentId=:sid ";
                              $query = $dbh -> prepare($sql);
                              $query-> bindParam(':sid', $sid, PDO::PARAM_STR);
                              $query->execute();
                              $results=$query->fetchAll(PDO::FETCH_OBJ);
                              $cnt=1;
                              if($query->rowCount() > 0)
                              {
                              foreach($results as $result)
                              {               ?>  
                           <div class="form-group">
                              <label>Student ID : </label>
                              <?php echo htmlentities($result->StudentId);?>
                           </div>
                           <div class="form-group">
                              <label>Enter Email</label>
                              <input class="form-control" type="email" name="email" id="emailid" value="<?php echo htmlentities($result->EmailId);?>"  autocomplete="off" required readonly />
                           </div>
                           <div class="form-group">
                              <label>Confirm Password</label>
                              <input class="form-control" type="password" name="password" id="passwordid" value=""  autocomplete="off" required/>
                           </div>
                           <?php }} ?>
                           <div class="text-center">
                           <button type="submit" name="delete" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true" ></i> Delete Account </button>
                           </div>
                           </br>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- CONTENT-WRAPPER SECTION END-->
      <?php include('includes/footer.php');?>
      <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS  -->
      <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
      <script src="assets/js/custom.js"></script>
   </body>
</html>
<?php } ?>