@extends('layout.master')

@section('content')

<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <h1>Room</h1>
          <ol class="breadcrumb">
          <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Room</li>
          </ol>
     </section>

     <!-- Main content -->
     <section class="content">

          <!-- list of rooms box -->
          <div class="box box-success">

               <div class="box-header with-border">
                    <h3 class="box-title">List of Rooms</h3>
               </div>
               
               <div class="box-body">
               
                    <table id="example1" class="table table-bordered table-striped">

                         <thead>
                              <tr>
                                   <th>Room Name</th>
                                   <th>Action</th>
                              </tr>
                         </thead>

                         <tbody>
                              @foreach($rooms as $room)
                                   <tr>
                                        <td>{{ $room->name }}</td>
                                        <td>
                                             <button type="button" class="btn btn-warning">Edit</button>

                                             <button type="button" class="btn btn-danger">Delete</button>
                                        </td>
                                   </tr>
                              @endforeach
                              
                         </tbody>

                    </table>

               </div>
               <!-- /.box-body -->

          </div>
          <!-- /.box -->


          <!-- create room box -->
          <div class="box box-primary">

               <div class="box-header with-border">
                    <h3 class="box-title">Create Room</h3>
               </div>

               <form id="form-validate" action="" method="POST">

                    @csrf
               
                    <div class="box-body">
                           
                         <div class="form-group">
                              <label for="name" class="col-sm-2 control-label">Room Name</label>

                              <div class="col-sm-5">
                                   <input type="text" class="form-control" id="name" placeholder="Room Name" name="name">
                              </div>
                         </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                         <button type="reset" class="btn btn-warning pull-right"><i class="fa fa-refresh"></i> Reset</button>

                         <button type="button" class="btn btn-success pull-right" id="save"><i class="fa fa-floppy-o"></i> Save</button>
                    </div>
                    <!-- /.box-footer -->
               </form>

          </div>
          <!-- /.box -->

     </section>
     <!-- /.content -->
</div>

@endsection


@section('ajax')
<script>
$(document).ready(function () {

     $('#save').click(function(){
          $('#form-validate').submit(function(e){
               e.preventDefault();

               var formdata = new FormData(this);

               $.post('settings/room', formdata, function(data){
                    console.log(data);
               })

          });
     });
});
</script>
@endsection