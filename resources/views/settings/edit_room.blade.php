@extends('layout.master')

@section('content')

<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <h1>Update Room</h1>
          <ol class="breadcrumb">
          <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Update Room</li>
          </ol>
     </section>

     <!-- Main content -->
     <section class="content">

          <!-- update room box -->
          <div class="box box-primary">

               <div class="box-header with-border">
                    <h3 class="box-title">Room</h3>
               </div>

               <!-- Success Message -->
               <div class="alert alert-success" style="display:none;" id="alert_message">
                    <i class="fa fa-check"></i> Room successfully updated.
               </div>
               <!-- !Success Message -->

               <form id="form-validate">

                    @csrf
               
                    <div class="box-body">
                           
                         <div class="form-group col-sm-12">
                              <label for="room_name" class="col-sm-2 control-label">Room Name</label>
                              <input type="hidden" id="room_id" value="{{ $room->id }}">

                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="room_name" placeholder="Room Name" name="name" value="{{ $room->name }}">
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
                    var room_id = $('#room_id').val();

                    $.ajax({
                         type: 'PATCH',
                         url: '/settings/room/'+room_id,
                         data: {
                              name:room_name
                         },
                         success: function(data){
                              $('#alert_message').show();
                              $('#alert_message').delay(10000).fadeOut();
                              $('#room_name').val('');
                              // console.log(data);
                              setTimeout('location.href="/settings/room";', 3000);
                         }
                    });
               }

          });

     });

</script>
@endsection