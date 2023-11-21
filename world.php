<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if (isset($_GET['lookup']) && $_GET['lookup'] === 'cities') {
    $country = htmlspecialchars($_GET['country'], ENT_QUOTES, 'UTF-8');
    $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities JOIN countries ON cities.country_code = countries.code WHERE countries.name LIKE '%$country%'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $cityTable = '<table>
    <tr>
      <th>Name</th>
     <th >District</th>
    <th >Population</th>
    </tr>';

   foreach ($results as $row){

    $cityTable .= '<tr>';
    $cityTable .= '<td>' . $row['name'] . '</td>';
    $cityTable .= '<td>' . $row['district'] . '</td>';
    $cityTable .= '<td>' . $row['population'] . '</td>';
    $cityTable .= '</tr>';
   }
   $cityTable .= '</table>';
   echo json_encode($cityTable);
   exit;
    
}

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