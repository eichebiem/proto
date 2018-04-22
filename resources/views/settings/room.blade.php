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

               <!-- Success Message -->
               <div class="alert alert-success" style="display:none;" id="alert_delete">
                    <i class="fa fa-check"></i> Room successfully deleted.
               </div>
               <!-- !Success Message -->
               
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
                                             <button type="button" class="btn btn-warning btn-sm edit" value="{{ $room->id }}"><i class="fa fa-edit"></i> Edit</button>

                                             <button type="button" class="btn btn-danger btn-sm delete" value="{{ $room->id }}"><i class="fa fa-times"></i> Delete</button>
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


               <!-- Success Message -->
               <div class="alert alert-success" style="display:none;" id="alert_message">
                    <i class="fa fa-check"></i> Room successfully created.
               </div>
               <!-- !Success Message -->


               <form id="form-validate">

                    @csrf
               
                    <div class="box-body">
                           
                         <div class="form-group col-sm-12">
                              <label for="room_name" class="col-sm-2 control-label">Room Name</label>

                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="room_name" placeholder="Room Name" name="name">
                              </div>
                         </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                         <button type="reset" class="btn btn-warning btn-sm pull-right"><i class="fa fa-refresh"></i> Reset</button>

                         <button type="submit" class="btn btn-success btn-sm pull-right"><i class="fa fa-floppy-o"></i> Save</button>
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

     $(function(){

          $.validator.setDefaults({
               errorClass: 'help-block',
               highlight: function(element) {
                    $(element)
                         .closest('.form-group')
                         .addClass('has-error');
               },
               unhighlight: function(element) {
                    $(element)
                         .closest('.form-group')
                         .removeClass('has-error');
               }
          });

          $('#form-validate').validate({

               rules: {
                    name: {
                         required: true,
                         minlength: 4
                    }
               },

               messages: {
                    name: {
                         required: "Room Name is required"
                    }
               },

               submitHandler: function(){
                    var room_name = $('#room_name').val();

                    $.ajax({
                         type: 'POST',
                         url: '/settings/room',
                         data: {
                              name:room_name
                         },
                         success: function(data){
                              $('#alert_message').show();
                              $('#alert_message').delay(10000).fadeOut();
                              $('#room_name').val('');
                              // console.log('data saved');
                              setTimeout('location.reload(true);', 3000);
                         }
                    });
               }

          });

          $('.edit').click(function(){
               var room_id = $(this).val();

               $.confirm({
                    title: 'Confirm Action',
                    content: 'Edit this room?',
                    type: 'orange',
                    typeAnimated: true,
                    icon: 'fa fa-warning',
                    theme: 'dark',
                    buttons: {
                         confirm: {
                              text: 'Yes',
                              btnClass: 'btn-success',
                              action: function () {
                                   location.href = '/settings/room/'+room_id;
                              }
                         },
                         cancel: {
                              text: 'No',
                              btnClass: 'btn-danger'
                         }
                    }
               });
          });

          $('.delete').click(function(){
               var room_id = $(this).val();

               $.confirm({
                    title: 'Confirm Action',
                    content: 'Delete this room?',
                    type: 'red',
                    typeAnimated: true,
                    icon: 'fa fa-warning',
                    theme: 'dark',
                    buttons: {
                         confirm: {
                              text: 'Yes',
                              btnClass: 'btn-success',
                              action: function () {
                                   $.ajax({
                                        type: 'POST',
                                        url: '/settings/room/'+room_id,
                                        success: function(data){
                                             $('#alert_delete').show();
                                             setTimeout('location.reload(true);', 3000);
                                        }
                                   });
                              }
                         },
                         cancel: {
                              text: 'No',
                              btnClass: 'btn-danger'
                         }
                    }
               });
          });

     });

</script>
@endsection