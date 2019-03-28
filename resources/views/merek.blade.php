<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Barang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<form style ="width:500px;margin-left:150px;margin-top:50px;" method="post">
@csrf
  <div class="form-group">
    <label>Merek</label>
    <input type="text" name ="merek" class="form-control"aria-describedby="emailHelp" placeholder="Masukan Merek">
  </div>
 
    
  
<button type="submit" class="btn btn-primary">Submit</button>
</form>
<div class="table-responsive">
  <table class="table">
    <tr>
    <td>ID</td><td>Merek</td>
    </tr>
    @foreach($data as $dt)
    <tr>
    <td>{{$dt->id_merek}}</td>
    <td>{{$dt->nama_merek}}</td>
    
    </tr>
    @endforeach
  </table>
</body>
</html>