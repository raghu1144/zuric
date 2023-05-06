
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
</head>
<body>
    <form action='order_status.php' method='post'>
        <input type='text' id='input_id'  name='input_id' value='1'>
        <select class='custom-select' name='input_select'>
        <option selected>Open this select menu</option>
        <option value='One'>One</option>
        <option value='Two'>Two</option>
        <option value='Three'>Three</option>
        </select>
                   
       <span> IN TRANSIT</span>
       <button class='btn btn-sm btn-primary mt-1' name='order_status_update' id='order_status_update' type='submit'>Update</button>
                  

        
    </form>
</body>
</html>