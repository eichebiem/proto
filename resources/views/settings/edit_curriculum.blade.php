@extends('layout.master')

@section('content')

<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <h1>Update Curriculum</h1>
          <ol class="breadcrumb">
          <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Update Curriculum</li>
          </ol>
     </section>

     <!-- Main content -->
     <section class="content">

          <!-- update curriculum box -->
          <div class="box box-primary">

               <div class="box-header with-border">
                    <h3 class="box-title">Curriculum</h3>
               </div>


               <!-- Success Message -->
               <div class="alert alert-success" style="display:none;" id="alert_message">
                    <i class="fa fa-check"></i> Curriculum successfully updated.
               </div>
               <!-- !Success Message -->


               <form id="form-validate">

                    @csrf
               
                    <div class="box-body">
                           
                         <div class="form-group">
                              <label for="curriculum_name" class="col-sm-2 control-label">Curriculum Name</label>

                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="curriculum_name" placeholder="Curriculum Name" name="name">
                              </div>
                         </div>

                         <br>
                         <br>

                         <div class="form-group">
                              <label for="grade_id" class="col-sm-2 control-label">Grade Level</label>

                              <div class="col-sm-10">
                                   <select name="grade_id" id="grade_id" class="form-control">
                                        <option value="" selected disabled>Select Grade Level</option>

                                        @foreach($levels as $level)
                                             <option value="{{ $level->id }}">{{ $level->name }}</option>
                                        @endforeach
                                   </select>
                              </div>
                         </div>

                         <br>
                         <br>

                         <div class="form-group">
                              <label for="curriculum_details" class="col-sm-2 control-label">Details</label>

                              <div class="col-sm-10">
                                   <textarea name="details" id="curriculum_details" class="form-control" placeholder="Grade Name" cols="30" rows="5"></textarea>
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
                    },
                    grade_id: {
                         required: true,
                    },
                    details: {
                         required: true,
                         minlength: 5
                    },
               },

               messages: {
                    name: {
                         required: "Room Name is required"
                    },
                    grade_id: {
                         required: "Grade Level is required"
                    },
                    details: {
                         required: "Details is required"
                    }
               },

               submitHandler: function(){
                    var curriculum_name = $('#curriculum_name').val();
                    var grade_id = $('#grade_id').val();
                    var curriculum_details = $('#curriculum_details').val();

                    $.ajax({
                         type: 'POST',
                         url: '/settings/curriculum',
                         data: {
                              'name':curriculum_name,
                              'grade_id':grade_id,
                              'details':curriculum_details
                         },
                         success: function(data){
                              $('#alert_message').show();
                              $('#alert_message').delay(10000).fadeOut();
                              $('#curriculum_name').val('');
                              $('#grade_id').val('');
                              $('#curriculum_details').val('');
                              // console.log(data);
                              setTimeout('location.reload(true);', 3000);
                         }
                    });
               }

          });

     });

</script>
@endsection