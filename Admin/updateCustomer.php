<?php
include './connection.php';
$fromDate = $toDate = '';
if(isset($_POST['updateCustomer'])) {
    // $fromDate = $_POST['fromDate'];
    // $toDate = $_POST['toDate'];
    $query = "SELECT * 
    FROM user u
    INNER JOIN user_xref ux 
    ON u.user_id = ux.user_id AND ux.type_id = 1001
    INNER JOIN register_details rd
    ON ux.pk_value = rd.register_details_id ";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);
    if($count == "0") {
        header('location: coustmersfile.php');
    }
}

?>

<!-- <div class="table1 mt-5">
            <table>
                <thead>
                    <tr>
                        <th>Sl. No.</th>
                        <th>Coustmers Id</th>
                        <th>Coustmer Name</th>
                        <th>Email</th>
                        <th>Number</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                  <tbody>
                  <?php
                  $sl = 0;
                  include './connection.php';
                  $sql = "SELECT * FROM user u
                  INNER JOIN user_xref ux
                  ON u.user_id = ux.user_id
                  INNER JOIN register_details ud
                  ON ud.register_details_id = ux.pk_value
                  WHERE ( CASE WHEN u.created_date IS NULL THEN  )";  
                  $result = mysqli_query($con, $sql);
                  while($user = mysqli_fetch_array($result)) {
                    $sl++;
                    ?>
                    <tr>
                        <td><?php echo $sl; ?></td>
                        <td><?php echo $user['user_id']; ?></td>
                        <td><?php echo $user['person_name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['mobile']; ?></td>
                        <td><?php echo $user['created_date']; ?></td>
                        <td><select class="form-select" aria-label="Default select example">
                                <option selected><?php echo "Active" ?></option>
                                <option selected><?php echo "Inactive" ?></option>
                            </select></td>
                        <td><span class="formgroup">
                                <button class="button-22">UPDATE</button>
                            </span></td>
                        </tr>
                        <?php 
                        } ?>
                </tbody>
            </table>
        </div> -->