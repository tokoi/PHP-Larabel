<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html> 

<html lang="en"> 

<head> 

    <title>Book List</title> 
    
<!-- CSS と JavaScript --> 

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



</head> 

    <body> 

    <div class="container"> 
    
        <nav class="navbar navbar-default"> 
        
        <!-- ナビバーの 内容 --> 
        
        </nav> 
    </div> 
    
    
    @yield('content') 
    
    </body> 

</html>