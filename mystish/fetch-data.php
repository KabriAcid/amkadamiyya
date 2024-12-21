<?php
require 'config.php';

// Fetch data from the database
$sql = "SELECT id, username, password, created_at FROM users";
$result = $conn->query($sql);

// Generate the HTML table
echo "<table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Timestamp</th>
        </tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["username"] . "</td>
                <td>" . $row["password"] . "</td>
                <td>" . $row["created_at"] . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No records found</td></tr>";
}
echo "</table>";
