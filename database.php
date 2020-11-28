<?php

function getCollections(){
    session_start();
    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);
    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');

    $current_user = $_SESSION['username'];

    $conn=new mysqli($hostname,$username,$password,$database);
        
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT id, name, location, notes FROM collection WHERE userId = '".$current_user."'";
    
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['location'] . "</td><td>" . $row['notes'] . "</td></tr>";
        }
    }else {
      echo "0 results";
    }
}
function getOrders(){  
    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);
    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');

    $conn=new mysqli($hostname,$username,$password,$database);
        
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT c.Name, o.Date, os.Status FROM Customers as c
    INNER JOIN OrderStatus as os ON os.Id=c.Status
    INNER JOIN `Order` as o ON o.CustomerId=c.Id;";

    $result = $conn->query($sql);
    
    if($result->num_rows > 0) {
        echo "<table>";
        while($row = mysql_fetch_array($result)){   
        echo "<tr><td>" . $row['Name'] . "</td>
        <td>" . $row['Date'] . "</td>
        <td>" . $row['Status'] . "</td>
        </tr>";
        }
        echo "</table>";
    }else {
      echo "0 results";
    }
}
function getEmployees(){  
    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);
    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');

    $conn=new mysqli($hostname,$username,$password,$database);
        
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT e.FirstName,e.LastName, e.Phone, e.Email, e.Address, s.Name FROM Customers as c
    INNER JOIN State as s ON s.Id=e.StateId;";

    $result = $conn->query($sql);
    
    if($result->num_rows > 0) {
        echo "<table>";
        while($row = mysql_fetch_array($result)){   
        echo "<tr><td>" . $row['FirstName'] . "</td>
        <td>" . $row['LastName'] . "</td>
        <td>" . $row['Phone'] . "</td>
        <td>" . $row['Email'] . "</td>
        <td>" . $row['Address'] . "</td>
        <td>" . $row['Salary'] . "</td>
        </tr>";
        }
        echo "</table>";
    }else {
      echo "0 results";
    }
}
function getBeers(){  
    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);
    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');

    $conn=new mysqli($hostname,$username,$password,$database);
        
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT b.BeerName as Beer,bs.Name as Style,b.Abv,br.Name as Brewer,s.Name as State, b.Allergen FROM Beer as b
    INNER JOIN BeerStyle as bs ON bs.Id=b.BeerStyle
    INNER JOIN Brewery as br ON br.Id=b.BreweryId
    INNER JOIN State as s ON s.Id=b.StateId;";

    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){   
        echo "<tr><td>" . $row['Beer'] . "</td><td>" . $row['Style'] . "</td><td>" . $row['Abv'] . "</td><td>" . $row['Brewer'] . "</td><td>" . $row['State'] . "</td><td>" . $row['Allergen'] . "</td></tr>";
        }
    }else {
     echo "0 results";
    }
}
function getBreweries(){  
    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);
    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');

    $conn=new mysqli($hostname,$username,$password,$database);
        
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT br.Name as Brewery,br.Address as Address,br.City as City,s.Name as State FROM Brewery as br
    INNER JOIN State as s ON s.Id=br.StateId;";

    $result = $conn->query($sql);
    
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){   
        echo "<tr><td>" . $row['Brewery'] . "</td><td>" . $row['Address'] . "</td><td>" . $row['City'] . "</td><td>" . $row['State'] . "</td>";
        }
    }else {
     echo "0 results";
    }
}
function login($email,$psw){
    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);
    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');

    $conn=new mysqli($hostname,$username,$password,$database);
    
    $_SESSION['loggedin']=FALSE;
    
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT Id FROM User WHERE email='${email}' and password='${psw}';";
    
    if ($conn->query($sql) === TRUE){
        echo "Login success...";
        $_SESSION['loggedin']=TRUE;
        header('Location: 192.168.1.9:12345/index.php');
    } 
    else{
        echo 'Incorrect username or password...';
    }
    $conn->close();
}
function submitFeedback($email,$feedback){
    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);
    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');

    $conn=new mysqli($hostname,$username,$password,$database);
    
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "INSERT INTO Feedback (Email, Feedback) VALUES (\"${email}\",\"${feedback}\")";
    
    if ($conn->query($sql) === TRUE){
        return 'New record created successfully';
    }
    else{
        return "Error: " .$sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>