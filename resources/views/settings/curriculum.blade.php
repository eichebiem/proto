@extends('layout.master')

@section('content')

<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <h1>Curriculum</h1>
          <ol class="breadcrumb">
          <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Curriculum</li>
          </ol>
     </section>

     <!-- Main content -->
     <section class="content">

          <!-- list of rooms box -->
          <div class="box box-success">

               <div class="box-header with-border">
                    <h3 class="box-title">Curriculum List</h3>
               </div>
               
               <div class="box-body">
               
                    <table id="example1" class="table table-bordered table-striped">

                         <thead>
                              <tr>
                                   <th>Curriculum Name</th>
                                   <th>Action</th>
                              </tr>
                         </thead>

                         <tbody>
                              @foreach($curriculums as $curriculum)
                                   <tr>
                                        <td>{{ $curriculum->name }}</td>
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
                    <h3 class="box-title">Add Curriculum</h3>
               </div>


               <!-- Success Message -->
               <div class="alert alert-success" style="display:none;" id="alert_message">
                    <i class="fa fa-check"></i> Curriculum successfully created.
               </div>
               <!-- !Success Message -->


               <form id="form-validate">

                    @csrf
               
                    <div class="box-body">
                           
                         <div class="form-group">
                              <label for="grade_name" class="col-sm-2 control-label">Grade Name</label>

                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="grade_name" placeholder="Grade Name" name="name">
                              </div>
                         </div>

                         <br>
                         <br>

                         <div class="form-group">
                              <label for="grade_name" class="col-sm-2 control-label">Grade Name</label>

                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="grade_name" placeholder="Grade Name" name="name">
                              </div>
                         </div>

                         <br>
                         <br>

                         <div class="form-group">
                              <label for="grade_name" class="col-sm-2 control-label">Details</label>

                              <div class="col-sm-10">
                                   <textarea name="" id="grade_name" class="form-control" placeholder="Grade Name" cols="30" rows="5"></textarea>
                              </div>
                         </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                         <button type="reset" class="btn btn-warning pull-right"><i class="fa fa-refresh"></i> Reset</button>

                         <button type="submit" class="btn btn-success pull-right"><i class="fa fa-floppy-o"></i> Save</button>
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
                         required: "Room Name is required"
                    }
               },

               submitHandler: function(){
                    var grade_name = $('#grade_name').val();

                    $.ajax({
                         type: 'POST',
                         url: '/settings/level',
                         data: {
                              name:grade_name
                         },
                         success: function(data){
                              $('#alert_message').show();
                              $('#alert_message').delay(10000).fadeOut();
                              $('#grade_name').val('');
                              // console.log('data saved');
                              setTimeout('location.reload(true);', 3000);
                         }
                    });
               }

          });

     });

</script>
@endsection