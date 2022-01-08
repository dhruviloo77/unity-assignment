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

    <title>Users</title>
</head>
<body>

<nav class="navbar navbar-dark bg-dark">

    <a class="navbar-brand" href="{{ url('/') }}">Users</a>
    <a class="nav-item nav-link" href="{{ url('companies') }}">Companies</a>
    
</nav>

@if (\Session::has('message'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('message') !!}</li>
        </ul>
    </div>
@endif

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#user-add">Add User</button>

    <table id="users" style="display" class="table table-striped table-bordered" >

        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#user-edit-{{ $user->id }}">Edit</button></td>
                        <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#user-delete-{{ $user->id }}">Delete</button></td>
                    </tr>

                     <!-- Modal Edit-->
                    <div class="modal fade" id="user-edit-{{{ $user->id }}}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                                <form name="user_edit" action="{{ route('editUser', $user->id) }}">
                                @csrf 
                                    <div class="form-group">
                                        <label>Id</label>
                                        <input name="uid" type="number" value="{{ $user->id }}" class="form-control">
                                        <small class="text-danger">{{ $errors->first('uid') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="uname" value="{{ $user->name }}" type="text" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Delete-->
                    <div class="modal fade" id="user-delete-{{{ $user->id }}}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                                <form name="user_delete" action="{{ route('deleteUser', $user->id) }}">
                                @csrf 
                                    <button type="submit" class="btn btn-delete">Delete</button>
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
        <div class="modal fade" id="user-add" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                    <form name="user_add" action="{{ route('addUser') }}" method="POST">
                    @csrf    
                        <div class="form-group">
                            <label>Id</label>
                            <input name="uid" type="number" class="form-control" placeholder="Enter Id">
                            <small class="text-danger">{{ $errors->first('uid') }}</small>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input name="uname" type="text" class="form-control" placeholder="Enter Name">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
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
        $(document).ready( function () {
            $('#users').DataTable({     
          });
        });

        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })

 </script>