@extends('layout.master')

@section('content')

<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <h1>Update Program</h1>
          <ol class="breadcrumb">
          <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Update Program</li>
          </ol>
     </section>

     <!-- Main content -->
     <section class="content">

          <!-- update program box -->
          <div class="box box-primary">

               <div class="box-header with-border">
                    <h3 class="box-title">Program</h3>
               </div>


               <!-- Success Message -->
               <div class="alert alert-success" style="display:none;" id="alert_message">
                    <i class="fa fa-check"></i> Program successfully updated.
               </div>
               <!-- !Success Message -->


               <form id="form-validate">

                    @csrf
               
                    <div class="box-body">
                           
                         <div class="form-group col-sm-12">
                              <label for="program_description" class="col-sm-2 control-label">Program Description</label>

                              <input type="hidden" id="program_id" value="{{ $program->id }}">

                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="program_description" placeholder="Program Description" name="description" value="{{ $program->description }}">
                              </div>
                         </div>

                         <div class="form-group col-sm-12">
                              <label for="program_code" class="col-sm-2 control-label">Program Code</label>

                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="program_code" placeholder="Program Code" name="code" value="{{ $program->code }}">
                              </div>
                         </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                         <button type="reset" class="btn btn-warning btn-sm"><i class="fa fa-refresh"></i> Reset</button>

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
                    description: {
                         required: true,
                         minlength: 5
                    },
                    code: {
                         required: true
                    }
               },

               messages: {
                    description: {
                         required: "Program Description is required"
                    },
                    code: {
                         required: "Program Code is required"
                    }
               },

               submitHandler: function(){
                    var program_description = $('#program_description').val();
                    var program_code = $('#program_code').val();
                    var program_id = $('#program_id').val();

                    $.ajax({
                         type: 'PATCH',
                         url: '/settings/program/'+program_id,
                         data: {
                              description:program_description,
                              code:program_code
                         },
                         success: function(data){
                              $('#alert_message').show();
                              $('#alert_message').delay(10000).fadeOut();
                              $('#program_description').val('');
                              $('#program_code').val('');
                              // console.log(data);
                              setTimeout('location.href="/settings/program";', 3000);
                         }
                    });
               }

          });

     });

</script>
@endsection