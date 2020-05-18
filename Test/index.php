<html>
    <body>
        <form action="#">
            <input type="text" name="a[]">
            <input type="text" name="a[]">
            <input type="submit" value="Submit" name="submit">
        </form>
    </body>
</html>

<?php 
    if (isset($_REQUEST['submit'])) {
        print_r($_REQUEST);
    }
?>