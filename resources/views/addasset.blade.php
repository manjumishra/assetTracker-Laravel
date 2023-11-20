@extends('dashboard')
<!DOCTYPE html>
<html>

<head>
    <title>Add Asset</title>
</head>

<body>
    @section('con')
    <div class="conrainer">
        <div class="jumbotron col-10 container">
            <div align=center>
                <h2 class="text-danger font-weight-bold">ADD ASSET</h2>
            </div>
            @if(Session::has('error'))
            <div class="alert alert-success font-weight-bold col-10 container ">{{Session::get('error')}}</div>
            @endif
            <form action="sendasset" method="post">
                @csrf()
                <div class="form-group">
                    <label>Asset Type</label>
                    <input type="text" name="Asset_type" class="form-control container" placeholder="asset type">
                    @if($errors->has('Asset_type'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('Asset_type')}}</label>
                    @endif
                </div>
                <div class="form-group">
                    <label>Description</label><br>
                    <textarea name="description" cols="45" rows="5"class="form-control container" placeholder="description"></textarea>
                    @if($errors->has('description'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('description')}}</label>
                    @endif
                </div>
                <div class="form-group">
                    <input type="submit" name="sub" value="Submit" class=" btn btn-info form-control col-4">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
@endsection