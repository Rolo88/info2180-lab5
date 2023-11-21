<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

// Check if 'country' parameter is set
if(isset($_GET['country'])) {
     
    $country = htmlspecialchars($_GET['country'], ENT_QUOTES, 'UTF-8');

    // Fetch data for the specified country
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%';");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $countryTable = '<table>
    <tr>
    <th>Country Name</th>
    <th>Continent</th>
    <th>Independence Year</th>
    <th>Head of State</th>
    </tr>';
    
    foreach ($results as $row) {
        $countryTable .= '<tr>';
        $countryTable .= '<td>' . $row['name'] . '</td>';
        $countryTable .= '<td>' . $row['continent'] . '</td>';
        $countryTable .= '<td>' . $row['independence_year'] . '</td>';
        $countryTable .= '<td>' . $row['head_of_state'] . '</td>';
        $countryTable .= '</tr>';
    }
    $countryTable .= '</table>';

    echo json_encode($countryTable);
    exit;
}
?>