<?php include 'db.php'; ?>

<form method="POST">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Mobile: <input type="text" name="mobile" required><br><br>
    Department: <input type="text" name="department" required><br><br>
    <input type="submit" name="submit" value="Add Student">
</form>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $department = $_POST['department'];

    mysqli_query($conn, "INSERT INTO student VALUES ('','$name','$email','$mobile','$department')");
}
?>

<h3>Student Records</h3>

<table border="1">
<tr>
    <th>ID</th><th>Name</th><th>Email</th><th>Mobile</th><th>Dept</th><th>Action</th>
</tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM student");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['email']}</td>
        <td>{$row['mobile']}</td>
        <td>{$row['department']}</td>
        <td>
            <a href='edit.php?id={$row['id']}'>Edit</a> |
            <a href='delete.php?id={$row['id']}'>Delete</a>
        </td>
    </tr>";
}
?>
</table>
