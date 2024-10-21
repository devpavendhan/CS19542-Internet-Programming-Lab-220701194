<?php

error_reporting(E_ALL); // Changed to show all errors for debugging
include('includes/config.php');

if (isset($_POST['send'])) {
    $cid = $_GET['cid'] ?? null; // Use null coalescing to handle unset cid
    $name = $_POST['fullname'] ?? '';
    $email = $_POST['email'] ?? '';
    $contactno = $_POST['contactno'] ?? '';
    $orgReqFor = $_POST['orgReqFor'] ?? '';
    $message = $_POST['message'] ?? '';

    // Check if any of the required fields are empty
    if (empty($name) || empty($email) || empty($contactno) || empty($orgReqFor)) {
        echo "<script>alert('Please fill all required fields.');</script>";
    } else {
        $sql = "INSERT INTO tblbloodrequirer(OrganDonorID, name, EmailId, ContactNumber, OrganRequirefor, Message) 
                VALUES(:cid, :name, :email, :contactno, :orgReqFor, :message)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':cid', $cid, PDO::PARAM_STR);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':contactno', $contactno, PDO::PARAM_STR);
        $query->bindParam(':orgReqFor', $orgReqFor, PDO::PARAM_STR);
        $query->bindParam(':message', $message, PDO::PARAM_STR);
        
        // Execute the query and check for errors
        if ($query->execute()) {
            echo '<script>alert("Request has been sent. We will contact you shortly.")</script>';
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
            print_r($query->errorInfo()); // Show error details for debugging
        }
    }
}
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Organ Donation Management System | Organ Request</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/fontawesome-all.css">
</head>
<body>
    <?php include('includes/header.php');?>

    <div class="inner-banner-w3ls">
        <div class="container"></div>
    </div>

    <div class="agileits-contact py-5">
        <div class="py-xl-5 py-lg-3">
            <div class="w3ls-titles text-center mb-5">
                <h3 class="title">Request an Organ</h3>
                <span><i class="fas fa-user-md"></i></span>
            </div>
            <div class="d-flex">
                <div class="col-lg-5 w3_agileits-contact-left"></div>
                <div class="col-lg-7 contact-right-w3l">
                    <h5 class="title-w3 text-center mb-5">Fill the form to request an organ</h5>
                    <form action="#" method="post">
                        <div class="d-flex space-d-flex">
                            <div class="form-group grid-inputs">
                                <label for="name" class="col-form-label">Your Name</label>
                                <input type="text" class="form-control" name="fullname" placeholder="Enter your name." required>
                            </div>
                            <div class="form-group grid-inputs">
                                <label for="contactno" class="col-form-label">Phone Number</label>
                                <input type="tel" class="form-control" name="contactno" placeholder="Enter your phone number." required>
                            </div>
                        </div>

                        <div class="d-flex space-d-flex">
                            <div class="form-group grid-inputs">
                                <label for="email" class="col-form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter your email address." required>
                            </div>
                            <div class="form-group grid-inputs">
                                <label for="orgReqFor" class="col-form-label">Organ Required For</label>
                                <select class="form-control" name="orgReqFor" required>
                                    <option value="">Select</option>
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Brother">Brother</option>
                                    <option value="Sister">Sister</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="message" class="col-form-label">Message</label>
                            <textarea rows="10" cols="100" class="form-control" name="message" placeholder="Enter your message" maxlength="999" style="resize:none"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Request" name="send">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php');?>
</body>
</html>
