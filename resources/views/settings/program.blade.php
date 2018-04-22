@extends('layout.master')

@section('content')

<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <h1>Program</h1>
          <ol class="breadcrumb">
          <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Program</li>
          </ol>
     </section>

     <!-- Main content -->
     <section class="content">

          <!-- list of programs box -->
          <div class="box box-success">

               <div class="box-header with-border">
                    <h3 class="box-title">List of Programs</h3>
               </div>

               <!-- Success Message -->
               <div class="alert alert-success" style="display:none;" id="alert_delete">
                    <i class="fa fa-check"></i> Program successfully deleted.
               </div>
               <!-- !Success Message -->
               
               <div class="box-body">
               
                    <table id="example1" class="table table-bordered table-striped">

                         <thead>
                              <tr>
                                   <th>Program Description</th>
                                   <th>Action</th>
                              </tr>
                         </thead>

                         <tbody>
                              @foreach($programs as $program)
                                   <tr>
                                        <td>{{ $program->description }}</td>
                                        <td>
                                             <button type="button" class="btn btn-warning btn-sm edit" value="{{ $program->id }}"><i class="fa fa-edit"></i> Edit</button>

                                             <button type="button" class="btn btn-danger btn-sm delete" value="{{ $program->id }}"><i class="fa fa-times"></i> Delete</button>
                                        </td>
                                   </tr>
                              @endforeach
                              
                         </tbody>

                    </table>

               </div>
               <!-- /.box-body -->

          </div>
          <!-- /.box -->


          <!-- create program box -->
          <div class="box box-primary">

               <div class="box-header with-border">
                    <h3 class="box-title">Create Program</h3>
               </div>


               <!-- Success Message -->
               <div class="alert alert-success" style="display:none;" id="alert_message">
                    <i class="fa fa-check"></i> Program successfully created.
               </div>
               <!-- !Success Message -->


               <form id="form-validate">

                    @csrf
               
                    <div class="box-body">
                           
                         <div class="form-group col-sm-12">
                              <label for="program_description" class="col-sm-2 control-label">Program Description</label>

                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="program_description" placeholder="Program Description" name="description">
                              </div>
                         </div>

                         <div class="form-group col-sm-12">
                              <label for="program_code" class="col-sm-2 control-label">Program Code</label>

                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="program_code" placeholder="Program Code" name="code">
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

                    $.ajax({
                         type: 'POST',
                         url: '/settings/program',
                         data: {
                              description:program_description,
                              code:program_code
                         },
                         success: function(data){
                              $('#alert_message').show();
                              $('#alert_message').delay(10000).fadeOut();
                              $('#program_description').val('');
                              $('#program_code').val('');
                              console.log('data saved');
                              setTimeout('location.reload(true);', 3000);
                         }
                    });
               }

          });

          $('.edit').click(function(){
               var program_id = $(this).val();

               $.confirm({
                    title: 'Confirm Action',
                    content: 'Edit this Program?',
                    type: 'orange',
                    typeAnimated: true,
                    icon: 'fa fa-warning',
                    theme: 'dark',
                    buttons: {
                         confirm: {
                              text: 'Yes',
                              btnClass: 'btn-success',
                              action: function () {
                                   location.href = '/settings/program/'+program_id;
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
               var program_id = $(this).val();

               $.confirm({
                    title: 'Confirm Action',
                    content: 'Delete this Program?',
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
                                        url: '/settings/program/'+program_id,
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