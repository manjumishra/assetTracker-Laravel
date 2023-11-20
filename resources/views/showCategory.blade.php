@extends('dashboard')
<!DOCTYPE html>
<html>

<head>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    @section('con')
    <div class="container">
            <table class="table table-hover" border=2>
                <tr>
                    <td colspan="12" align="center" id="a" class="table-success" style="font-size:30px; font-weight:bold;color:brown">Asset Details</td>
                </tr>
                <tr class="bg-dark text-light">
                    <th>S.no</th>
                    <th>Asset Name</th>
                    <th>Code</th>
                    <th>Status</th>
                    <th>Asset Type_Id</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @php
                $sn=1;
                @endphp
                @foreach($sel as $q)
                <tr class="table-secondary">
                    <td>{{$sn}}</td>
                    <td>{{$q->name}}</td>
                    <td>{{$q->code}}</td>
                    @if($q->status=='1')
                    <td><a href=""id="active"class="btn btn-success">Active</a></td>
                    @else
                    <td><a href=""class="btn btn-dark" id="inactive">Inactive</a></td>
                    @endif
                   
                    <td>{{$q->type_id}}</td>
                    <td>
                        <img src="{{('/uploads/'.$q->image)}}" alt="no image" height="40" weight="40">
                    </td>
                    <td>
                        <a href="/edit/{{$q->id}}" class="btn btn-info">Edit</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                            Delete
                        </button>
                    </td>
                </tr>
                 @php
                $sn++;
                @endphp 
                
               <!-- For Delete Pop_up -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-info" id="exampleModalLongTitle">Confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body bg-light" align=center>
                                <h2>Are you sure <i class="text-danger fa fa-exclamation-triangle"></i></h2>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger col-3" data-dismiss="modal">No</button>
                                <a href="/delcat/{{$q->id}}" class="btn btn-success col-3">
                                    Yes</a>
                       @endforeach

            </table>
        </div>
        
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
       $('#active').click(function(){
         $('#active').css('background-color','red');
           $(this).html('Inactive')

       });
    });
</script> -->
</body>

</html>
@endsection