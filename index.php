<?php


require 'db.php';

$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);

$database = "contact_db";
$db_found = mysqli_select_db($db_handle, $database);
if ($db_found) {
//    print "Database found";
} else {
//    print "Database not found";
}


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Accept: application/json");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$requestMethod = $_SERVER["REQUEST_METHOD"];

// fetch all contacts from db
if (isset($_GET['all_contacts'])) {

    $SQL = "SELECT * FROM contact_db.contacts order by id desc ";
    $result = mysqli_query($db_handle, $SQL);
    $contacts = [];
    while ($db_field = mysqli_fetch_assoc($result)) {
        $contacts[] = [
            'id' => $db_field['id'],
            'name' => $db_field['name'],
            'phone_number' => $db_field['phone_number'],
            'address' => $db_field['address'],
            'email' => $db_field['email']
        ];
    }
    echo json_encode($contacts);
} else if (isset($_GET['save_contact'])) {
    $input = (array)json_decode(file_get_contents('php://input'), TRUE);

    $name = mysqli_real_escape_string($db_handle, $input['name']);
    $phoneNumber = mysqli_real_escape_string($db_handle, $input['phone_number']);
    $address = mysqli_real_escape_string($db_handle, $input['address']);
    $email = mysqli_real_escape_string($db_handle, $input['email']);


    $sql = "INSERT INTO contact_db.contacts (name, phone_number, address,email) VALUES ('$name', '$phoneNumber', '$address','$email')";

    if (mysqli_query($db_handle, $sql)) {
        $response['status_code_header'] = 'HTTP/1.1 201 Created';
        $response['body'] = null;
        echo json_encode($response);
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db_handle);
    }
} else if (isset($_GET['update_contact'])) {
    $input = (array)json_decode(file_get_contents('php://input'), TRUE);

    $id = mysqli_real_escape_string($db_handle, $input['id']);
    $name = mysqli_real_escape_string($db_handle, $input['name']);
    $phoneNumber = mysqli_real_escape_string($db_handle, $input['phone_number']);
    $address = mysqli_real_escape_string($db_handle, $input['address']);
    $email = mysqli_real_escape_string($db_handle, $input['email']);

    $sql = "UPDATE contact_db.contacts set name='$name',phone_number='$phoneNumber',address='$address',email='$email' where id=$id";

    if (mysqli_query($db_handle, $sql)) {
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = 'Data successfully updated';
        echo json_encode($response);
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db_handle);
    }
} else if (isset($_GET['id']) && $requestMethod=='GET') {
    $id = $_GET['id'];
    $SQL = "SELECT * FROM contact_db.contacts where id=$id LIMIT 1";
    $result = mysqli_query($db_handle, $SQL);
    $db_field = mysqli_fetch_assoc($result);
    $contact = [
        'id' => $db_field['id'],
        'name' => $db_field['name'],
        'phone_number' => $db_field['phone_number'],
        'email' => $db_field['email'],
        'address' => $db_field['address'],
    ];
    echo json_encode($contact);
} else if ($requestMethod == 'DELETE') {
    $id = $_GET['id'];
    $SQL = "DELETE  FROM contact_db.contacts where id=$id";
    $result = mysqli_query($db_handle, $SQL);

    if ($result) {
        $response['status_code_header'] = 'HTTP/1.1 204 OK';
        $response['body'] = 'Data successfully delete';
        echo json_encode($response);
    } else {
        $response['status_code_header'] = 'HTTP/1.1 400 Bad Request';
        $response['body'] = 'Unable to delete data';
        echo json_encode($response);
    }
}


mysqli_close($db_handle);
