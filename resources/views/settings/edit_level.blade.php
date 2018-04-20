@extends('layout.master')

@section('content')

<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <h1>Update Grade Level</h1>
          <ol class="breadcrumb">
          <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Update Grade Level</li>
          </ol>
     </section>

     <!-- Main content -->
     <section class="content">

          <!-- update grade level box -->
          <div class="box box-primary">

               <div class="box-header with-border">
                    <h3 class="box-title">Grade Level</h3>
               </div>


               <!-- Success Message -->
               <div class="alert alert-success" style="display:none;" id="alert_message">
                    <i class="fa fa-check"></i> Grade Level successfully updated.
               </div>
               <!-- !Success Message -->


               <form id="form-validate">

                    @csrf
               
                    <div class="box-body">
                           
                         <div class="form-group">
                              <label for="grade_name" class="col-sm-2 control-label">Grade Name</label>

                              <input type="hidden" id="grade_id" value="{{ $level->id }}">

                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="grade_name" placeholder="Grade Name" name="name" value="{{ $level->name }}">
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
                         minlength: 5
                    }
               },

               messages: {
                    name: {
                         required: "Grade Level is required"
                    }
               },

               submitHandler: function(){
                    var grade_name = $('#grade_name').val();
                    var grade_id = $('#grade_id').val();

                    $.ajax({
                         type: 'PATCH',
                         url: '/settings/level/'+grade_id,
                         data: {
                              name:grade_name
                         },
                         success: function(data){
                              $('#alert_message').show();
                              $('#alert_message').delay(10000).fadeOut();
                              $('#grade_name').val('');
                              // console.log(data);
                              setTimeout('location.href="/settings/level";', 3000);
                         }
                    });
               }

          });

     });

</script>
@endsection