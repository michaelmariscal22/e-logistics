<form method="POST">
    <p>
        <input type="text" name="address" placeholder="Enter address">
    </p>
 
    <input type="submit" name="submit_address" value="Search">
</form>


<?php
    if (isset($_POST["submit_address"]))
    {
        $address = $_POST["address"];
        $address = str_replace(" ", "+", $address);
        ?>
 
        <iframe width="30%" style="margin: 0 auto; border-radius: 25px;" height="300" src="https://maps.google.com/maps?q=<?php echo $address; ?>&output=embed"></iframe>
 
        <?php
    }
?>
