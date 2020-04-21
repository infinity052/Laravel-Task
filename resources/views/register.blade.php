<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
   </head>
<body>
<div style="background: black; height: 15vh; display:flex; align-items: center; justify-content: center"><h1 class="display-2" style="text-align: center; color: white;">ATG Task</h1></div>
<form action="success" method="POST">
@csrf
    @method('POST')
    <div class="p-4">
    <div class="h1">Name</div>
    <input class="form-control" type="text" name = "name">
    @error('name')<div class="alert alert-danger d-lg-block">{{$message}}</div>@enderror</div>
    <div class="p-4">
    <div class="h1 d-lg-block">Email</div>
    <input class="form-control" type="text" name="email" >
    @error('email')<div class="alert alert-danger d-lg-block">{{$message}}</div>@enderror</div>
    <div class="p-4">
    <div class="h1 d-lg-block">Pincode</div>
    <div><input class="form-control"type="text" name="pincode"></div>
    @error('pincode') <div class="alert alert-danger d-lg-block">{{$message}}</div>@enderror</div>
    <div class="p-4 "><button class="btn btn-outline-success d-lg-block btn-lg font-weight-bold " style="font-size: 1.5em"type="submit">Submit</button></div>
    </form>
</body>
</html>