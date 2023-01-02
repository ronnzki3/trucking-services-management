<?php
include 'classes/Dbclass.php';
$db=new Dbclass();

if (!empty($_POST["keyword"])) {
    // $sql = $conn->prepare("SELECT * FROM country WHERE country_name LIKE  ? ORDER BY country_name LIMIT 0,6");
    // $search = "{$_POST['keyword']}%";
    // $sql->bind_param("s", $search);
    // $sql->execute();
    // $result = $sql->get_result();

    $search = $_POST['keyword'];
    $result=$db->select('driver','*',"WHERE driver LIKE '".$search."%' Order by driver LIMIT 0,6");
    if (!empty($result)) {
        
        ?>
<ul id="country-list">
<?php
        foreach ($result as $country) {
            ?>
   <li onClick="selectCountry('<?php echo $country["driver"]; ?>');">
      <?php echo $country["driver"]; ?>
    </li>
<?php
        }// end for
    ?>
</ul>
    <?php
    }// end if not empty
}
?>