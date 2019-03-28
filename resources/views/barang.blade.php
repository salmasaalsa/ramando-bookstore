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
<form style ="width:750px;margin-left:150px;margin-top:50px;" action="{{route('barang.store')}}" method="post">
  @csrf
  <div class="form-group">
    <label>Nama Barang</label>
    <input name="barang" type="text" class="form-control"aria-describedby="emailHelp" placeholder="Masukan Nama Barang">
  </div>
  <div class="form-group">
    <label>Stock Barang</label>
    <input name="stock" type="text" class="form-control"aria-describedby="emailHelp" placeholder="Masukan Nama Barang">
  </div>
  <div class="form-group">
    <label>Harga Barang</label>
    <input name ="harga"  type="text" class="form-control"aria-describedby="emailHelp" placeholder="Masukan Nama Barang">
  </div>
  <div class="form-group">
  <div class="form-group">
    <label>Deskripsi Barang</label>
    <textarea name="deskripsi" class="form-control"  rows="3" placeholder="masukan Deskripsi Barang"></textarea>
  </div>
    
  
<button type="submit" class="btn btn-primary">Submit</button>
</form>
<div class="table-responsive">
  <table class="table">
    <tr>
    <td>ID</td>
    <td>Nama Barang</td>
    <td>Stok</td>
    <td>Harga</td>
    <td>Deskripsi</td>
    <td>Action</td>
    </tr>
    @foreach($data as $dt)
    <tr>
    <td>{{$dt->id_barang}}</td>
    <td>{{$dt->nama_barang}}</td>
    <td>{{$dt->stok}}</td>
    <td>{{$dt->harga}}</td>
    <td>{{$dt->deskripsi}}</td>
    <td><form action="{{route('barang.destroy',$dt->id_barang)}}"method="post">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" type="submit">DELETE</button>
    </form>
    </td>
    </tr>
    @endforeach
  </table>
</div>
</body>
</html>