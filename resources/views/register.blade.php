<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
   
    <script src="/js/app.js" defer></script>
  
   </head>
<body>
<div id="successdiv" style="display:none;">
<h1 class="h1 p-4">Record Successfully Added</h1>
   
    <div class="p-4 "><button class="btn btn-primary d-lg-block btn-lg font-weight-bold " style="font-size: 1.5em" id="redo">Add more records</button></div>
    
</div>
<div id="form">
<div style="background: black; height: 15vh; display:flex; align-items: center; justify-content: center"><h1 class="display-2" style="text-align: center; color: white;">ATG Task</h1></div>

    <div class="p-4">
    <div class="h1">Name</div>
    <input class="form-control" type="text" name = "name" id="name-txt">
    <div class="alert alert-danger"style="display:none;" id="name-error"></div></div>
    <div class="p-4">
    <div class="h1 d-lg-block">Email</div>
    <input class="form-control" type="text" name="email" id="email-txt">
   <div class="alert alert-danger " style="display:none;" id="email-error"></div></div>
    <div class="p-4">
    <div class="h1 d-lg-block">Pincode</div>
    <div><input class="form-control"type="text" name="pincode" id="pincode-txt"></div>
     <div class="alert alert-danger "style="display:none;" id="pincode-error"></div>

     
    <div class="p-4 d-lg-block "><button class="btn btn-outline-success btn-lg font-weight-bold " style="font-size: 1.5em" id="submit">Submit</button></div>
    </div>
</body>
</html>