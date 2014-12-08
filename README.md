Book Locator
=======
<h3>Recent Changes</h3>
<ul>
<li>Database updated: use search to see the added attributes</li>
<li>Had to change query for "Newest Arrivals". The datatype for YEAR_OF_Publication was changed to DATE and no longer worked when being compared against an integer.</li>
</ul>
=======
CIS4301 DB Project


<b>Make sure the following appears in all of your php files in order to connect to the database:</b>

```php
#!/usr/local/bin/php
<?php require ('../connect.php'); // connects to database 
/* 
connect.php contains: 
$connection = oci_connect($username, $password, $server);
*/
?> 

<?php
...

Some PHP...

...
?>

<?php oci_close($connection); ?> <!--closes database connection-->
```
