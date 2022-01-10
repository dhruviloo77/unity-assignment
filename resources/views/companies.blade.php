<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- DataTables and Bootstrap CDN -->

    

    <!-- Bootsrap Modals -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Companies</title>
</head>
<body>

<nav class="navbar navbar-dark bg-dark">

    <a class="nav-item nav-link" href="{{ url('/') }}">Users</a>
        
    <a class="navbar-brand" href="{{ url('companies') }}">Companies</a>

</nav>

@if (\Session::has('message'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('message') !!}</li>
        </ul>
    </div>
@endif

<br>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#company-add">Add Company</button>
<br>

    <table id="companies" style="display" class="table table-striped table-bordered" >

        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Add Users</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
            <tbody>
                @foreach($companies as $company)
                   
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>   
                        <td> <button type="button" class="btn btn-primary" data-toggle="modal"  data-target="#users-add-{{ $company->id }}" >Add Users</button> </td>                       
                        <td> <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#company-edit-{{ $company->id }}">Edit</button></td>
                        <td> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#company-delete-{{ $company->id }}">Delete</button></td>
                    </tr>
              

                     <!-- Modal Edit-->
                    <div class="modal fade" id="company-edit-{{{ $company->id }}}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Company</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                                <form name="company_edit" action="{{ route('editCompany', $company->id) }}">
                                @csrf 
                                    <div class="form-group">
                                        <label>Id</label>
                                        <input name="cid" type="number" value="{{ $company->id }}" class="form-control">
                                        <small class="text-danger">{{ $errors->first('cid') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="cname" value="{{ $company->name }}" type="text" class="form-control">
                                        <small class="text-danger">{{ $errors->first('cname') }}</small>
                                    </div>
                                    <button type="submit" class="btn btn-warning">Submit</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>              
                    
                    <!-- Modal Add User to Company-->
                           
                    <div class="modal fade"  id="users-add-{{ $company->id }}"  tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Users to Company</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                                <form name="user_add" action="{{ route('addUserToCompany', $company->id) }}">
                                @csrf 
                                @foreach($users as $user)
                                    <div class="form-group">
                                            <label>{{ $user->name }}</label>
                                            <input class="d-inline" name="user_id" @if($user->company_id ==  $company->id) checked @endif value="{{$user->id}}" type="checkbox" type="text" class="form-control"> <br>
                                    </div>
                                @endforeach
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Delete-->
                    <div class="modal fade" id="company-delete-{{{ $company->id }}}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Company</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                                <form name="company_delete" action="{{ route('deleteCompany', $company->id) }}">
                                @csrf 
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>    
    </table>

        <!-- Modal Add-->
        <div class="modal fade" id="company-add" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Company</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                    <form name="company_add" action="{{ route('addCompany') }}" method="POST">
                    @csrf    
                        <div class="form-group">
                            <label>Id</label>
                            <input name="cid" type="number" class="form-control" placeholder="Enter Id">
                            <small class="text-danger">{{ $errors->first('cid') }}</small>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input name="cname" type="text" class="form-control" placeholder="Enter Name">
                            <small class="text-danger">{{ $errors->first('cname') }}</small>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                </div>
                </div>
            </div>
        </div>

        

                   
        
       
            
</body>
</html>

<!-- Initialize DataTable -->

<script type="text/javascript">
    
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })

 </script>