<?php
require("config.php");
$query = "SELECT * FROM payments WHERE approved_by_buyer !='no' OR approved_by_seller !='no' ";
$result = mysqli_query($con, $query);
if (!$result) {
    // Handle the case when the query fails
    echo json_encode(array('error' => 'Error executing the query: ' . mysqli_error($con)));
} else {
    // Handle the case when the query returns no results
    if (mysqli_num_rows($result) == 0) {
        echo json_encode(array('error' => 'No data found'));
    } else {
        // Fetch and output data
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo json_encode($data);
    }
}
// Close the database connection
mysqli_close($con);
?>
