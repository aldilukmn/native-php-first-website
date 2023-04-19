<?php

// Connect to database
$connect = mysqli_connect("localhost", "root", "", "hms");

// For take table from database
function query($query)
{
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
};

// For add data to table patients
function add($data)
{

    global $connect;

    // Take data from each element
    $name = htmlspecialchars($data["name"]);
    $phone = htmlspecialchars($data["phone"]);
    $address = htmlspecialchars($data["address"]);
    $indication = htmlspecialchars($data["indication"]);

    // Query insert data
    $query = "INSERT INTO patients
                    VALUES
                    ('', '$name', '$phone', '$address', '$indication')
                    ";

    mysqli_query($connect, $query);

    return mysqli_affected_rows($connect);
}

// For edit
function edit($edit)
{

    global $connect;

    // Take data from each element
    $id = $edit["id"];
    $name = htmlspecialchars($edit["name"]);
    $phone = htmlspecialchars($edit["phone"]);
    $address = htmlspecialchars($edit["address"]);
    $indication = htmlspecialchars($edit["indication"]);

    $query = "UPDATE patients SET 
                        name = '$name',
                        phone = '$phone',
                        address = '$address',
                        indication = '$indication'
                    WHERE id = $id
        ";

    mysqli_query($connect, $query);

    mysqli_affected_rows($connect);
}

// For delete
// function delete($id) {

//     global $connect;

//     $query = "DELETE FROM patients WHERE id = $id";

//     mysqli_query($connect, $query);

//     mysqli_affected_rows($connect);
// }

// For search
function search($keyword)
{

    global $connect;

    $query = "SELECT * FROM patients
                    WHERE
                name LIKE '%$keyword%'
                -- phone LIKE '%$keyword%' OR
                -- address LIKE '%$keyword%' OR
                -- indication LIKE '%$keyword%'
        ";

    $conn = mysqli_query($connect, $query);

    $check = mysqli_num_rows($conn);

    if ($keyword == null) {
        echo "
                <script>
                    alert('Please enter patient is name!');
                    document.location.href = 'pasient.php'
                </script>
        ";
    } elseif (empty($check)) {
        echo "
                    <script>
                        alert('Data not found!');
                        document.location.href = 'pasient.php'
                    </script>
            ";
    } else {

        return query($query);
    }


    // if (empty($check)) {
    // echo "
    //         <script>
    //             alert('Data Tidak Ditemukan');
    //             document.location.href = 'pasient.php'
    //         </script>
    // ";
    // } else {

    //     return query($query);

    // }

    $conn = mysqli_query($connect, $query);
}

// For register
function regis($data)
{

    global $connect;

    $name = $data["name"];
    $uname = strtolower(stripslashes($data["uname"]));
    // $email = $data["email"];
    // $mobile = $data["mobile"];
    $pass = mysqli_real_escape_string($connect, $data["pass"]);
    $cpass = mysqli_real_escape_string($connect, $data["cpass"]);



    // Username check
    $result = mysqli_query($connect, "SELECT username FROM admin WHERE username = '$uname'");

    if (mysqli_fetch_assoc($result)) {

        echo "
                <script>
                    alert('Username already taken!')
                </script>";

        return false;
    }

    // Password confirm check
    if ($pass !== $cpass) {
        echo "
                <script> 
                    alert('The password confirmation does not match.!')
                </script>
            ";
        return false;
    }

    // Encryption password
    $password = password_hash($pass, PASSWORD_DEFAULT);

    // Add new user to database
    mysqli_query($connect, "INSERT INTO admin VALUE('', '$name', '$uname', '$password')");

    return mysqli_affected_rows($connect);
}

// Paginition
$totalDataPerPage = 10;

$totalOfData = COUNT(query("SELECT * FROM patients"));

$totalOfpage = CEIL($totalOfData / $totalDataPerPage);

$activePage = (isset($_GET["page"])) ? $_GET["page"] : 1;

$firstPage = ($totalDataPerPage * $activePage) - $totalDataPerPage;

$totalLink = 1;

if ($activePage > $totalLink) {

    $startNumber = $activePage - $totalLink;
} else {

    $startNumber = 1;
}

if ($activePage < ($totalOfpage - $totalLink)) {

    $endNumber = $activePage + $totalLink;
} else {

    $endNumber = $totalOfpage;
}

// Modal add patient
if (isset($_POST['addPatient'])) {

    global $connect;

    $name = mysqli_real_escape_string($connect, htmlspecialchars($_POST['name']));
    $phone = mysqli_real_escape_string($connect, htmlspecialchars($_POST['phone']));
    $address = mysqli_real_escape_string($connect, htmlspecialchars($_POST['address']));
    $indication = mysqli_real_escape_string($connect, htmlspecialchars($_POST['indication']));

    if ($name == null || $phone == null || $address == null || $indication == null) {

        $errorAdd = true;

        return false;
    }
    $query = "INSERT INTO patients
                    VALUES
                ('', '$name', '$phone', '$address', '$indication')
                ";

    $conn = mysqli_query($connect, $query);

    if ($conn > 0) {

        $successAdd = true; 
    } else {

        $errorAdd = true;

        return false;
    }
}

// Upload image
function upload()
{
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

    if ($error === 4) {
        echo "<script>
            alert('Choose the picture first!');
            </script>";
        return false;
    }

    $validImageExt = ['jpg', 'jpeg', 'png'];
    $imageExt = explode('.', $fileName);
    $imageExt = strtolower(end($imageExt));

    if (!in_array($imageExt, $validImageExt)) {
        echo "<script>
            alert('It is not a picture!');
            </script>";
        return false;
    }

    if ($fileSize > 100000) {
        echo "<script>
            alert('Picture too large!');
            </script>";
        return false;
    }

    $imageSize = getimagesize($tmpName);
    $imageWidth = $imageSize[0];
    $imageHeight = $imageSize[1];

    if ($imageWidth != $imageHeight) {
        echo "<script>
            alert('Picture must be square!');
            </script>";
        return false;
    }

    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $imageExt;

    move_uploaded_file($tmpName, 'admin/assets/img/' . $newFileName);

    return $newFileName;
}

// Modal add doctor
if (isset($_POST['addDoctor'])) {

    global $connect;

    $name = mysqli_real_escape_string($connect, htmlspecialchars($_POST['name']));
    $address = mysqli_real_escape_string($connect, htmlspecialchars($_POST['address']));
    $email = mysqli_real_escape_string($connect, htmlspecialchars($_POST['email']));
    $phone = mysqli_real_escape_string($connect, htmlspecialchars($_POST['phone']));
    $specialist = mysqli_real_escape_string($connect, htmlspecialchars($_POST['specialist']));
    $agenda = mysqli_real_escape_string($connect, htmlspecialchars($_POST['agenda']));

    $image = upload();

    if (!$name || !$address || !$email || !$phone || !$specialist || !$agenda || !$image) {

        $errorAdd = true;

        return false;
    }

    $query = "INSERT INTO doctors
                    VALUES
                ('', '$name', '$address', '$email', '$phone', '$specialist', '$agenda', '$image')
                ";

    $result = mysqli_query($connect, $query);

    if ($result > 0) {

        $successAdd = true;

        return false;
    } else {

        $errorAdd = true;

        return false;
    }
}


// Modal edit patient
if (isset($_POST['editPatient'])) {

    global $connect;

    $id = mysqli_real_escape_string($connect, htmlspecialchars($_POST['update_id']));
    $name = mysqli_real_escape_string($connect, htmlspecialchars($_POST['name']));
    $phone = mysqli_real_escape_string($connect, htmlspecialchars($_POST['phone']));
    $address = mysqli_real_escape_string($connect, htmlspecialchars($_POST['address']));
    $indication = mysqli_real_escape_string($connect, htmlspecialchars($_POST['indication']));

    $query = "UPDATE patients SET 
                        name = '$name',
                        phone = '$phone',
                        address = '$address',
                        indication = '$indication'
                    WHERE id = $id
        ";

    $conn = mysqli_query($connect, $query);

    if ($conn) {

        $successEdit = true;

        return false;
    } else {
        echo "
                <script>
                alert('Data Not Updated!');
                </script>
            ";
    }
}

// Modal edit doctor
if (isset($_POST['editDoctor'])) {

    global $connect;

    $id = mysqli_real_escape_string($connect, htmlspecialchars($_POST['update_id']));
    $name = mysqli_real_escape_string($connect, htmlspecialchars($_POST['name']));
    $address = mysqli_real_escape_string($connect, htmlspecialchars($_POST['address']));
    $email = mysqli_real_escape_string($connect, htmlspecialchars($_POST['email']));
    $phone = mysqli_real_escape_string($connect, htmlspecialchars($_POST['phone']));
    $specialist = mysqli_real_escape_string($connect, htmlspecialchars($_POST['specialist']));
    $agenda = mysqli_real_escape_string($connect, htmlspecialchars($_POST['agenda']));
    $past_image = mysqli_real_escape_string($connect, htmlspecialchars($_POST['past_image']));

    if ($_FILES['image']['error'] === 4) {
        $image = $past_image;
    } else {
        $image = upload();
    }

    $query = "UPDATE doctors SET 
                    name = '$name',
                    address = '$address',
                    email = '$email',
                    phone = '$phone',
                    specialist = '$specialist',
                    agenda = '$agenda',
                    image = '$image'
                WHERE id_doctor = $id
    ";

    $conn = mysqli_query($connect, $query);

    if ($conn) {

        $successEdit = true;

        return false;
    } else {
        echo "
            <script>
            alert('Data Not Updated!');
            </script>
        ";
    }
}

// For delete patient
if (isset($_POST['delPatient'])) {

    global $connect;

    $id = $_POST['delete_id'];

    $query = "DELETE FROM patients WHERE id = $id";

    $result = mysqli_query($connect, $query);

    if ($result) {
        $successDel = true;
        return false;
    } else {
        echo "Data not deleted";
    }
}

// For delete doctor
if (isset($_POST['delDoctor'])) {

    global $connect;

    $id = $_POST['delete_id'];

    $query = "DELETE FROM doctors WHERE id_doctor = $id";

    $result = mysqli_query($connect, $query);

    if ($result) {
        $successDel = true;

        return false;
    } else {

        echo "Data not deleted";
    }
}

// Modal add patient
if (isset($_POST['addDoctor'])) {

    global $connect;

    $name = mysqli_real_escape_string($connect, htmlspecialchars($_POST['name']));
    $address = mysqli_real_escape_string($connect, htmlspecialchars($_POST['address']));
    $email = mysqli_real_escape_string($connect, htmlspecialchars($_POST['email']));
    $phone = mysqli_real_escape_string($connect, htmlspecialchars($_POST['phone']));
    $specialist = mysqli_real_escape_string($connect, htmlspecialchars($_POST['specialist']));
    $agenda = mysqli_real_escape_string($connect, htmlspecialchars($_POST['agenda']));
    $image = mysqli_real_escape_string($connect, htmlspecialchars($_POST['image']));

    if ($name == null || $address == null || $email == null || $phone == null || $specialist == null || $agenda = null || $image = null) {

        $errorAdd = true;

        return false;
    }
    $query = "INSERT INTO doctors
                    VALUES
                ('', '$name', '$address', '$email', '$phone', '$specialist', '$agenda', '$image')";

    $conn = mysqli_query($connect, $query);

    if ($conn) {

        $successAdd = true;

        return false;
    } else {

        $errorAdd = true;

        return false;
    }
}
