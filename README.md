CIS4301
=======

DB Project


Make sure the following appears in all of you php files in order to connect to the database.

```
#!/usr/local/bin/php
<?php require ('../connect.php'); ?>

...

Some PHP

...

oci_close($connection);
```
