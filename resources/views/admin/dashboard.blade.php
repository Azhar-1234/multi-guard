<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <h1 class="col-md-4">ADMIN DASHBOARD!</h1>
            <a class="col-md-6 mt-3" href="{{route('admin.logout')}}">
                <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> 
                <span class="align-middle">  Logout </span>
            </a>
        </div>
        <div class="row">
          <div class="card  col-md-4">
            
            <div class="card-body">
              <form class="px-md-2" action="{{route('admin.store')}}" method="POST"  enctype="multipart/form-data">
                  @csrf
                    <div class="form-outline mb-4">
                      <input type="text" name="name" id="form3Example1q" class="form-control" placeholder="entar your name" />
                      <label class="form-label" for="form3Example1q">Name</label>
                    </div>
                    <div class="form-outline mb-4">
                      <input type="email" name="email" id="form3Example1q" class="form-control" placeholder="entar your email" />
                      <label class="form-label" for="form3Example1q">email</label>
                    </div>
                    <div class="form-outline mb-4">
                      <input type="password" name="password" id="form3Example1q" class="form-control" name="password"  placeholder="entar your password" />
                      <label class="form-label" for="form3Example1q">password</label>
                    </div>
                    <div class="col-md-6 mb-4">
                      <select class="select" name="role_id">
                        <option value="">select your role</option>
                        <option value="1">admin</option>
                        <option value="2">user</option>
                      </select>
                    </div>
                    <div class="col-md-6 mb-4">
                      <select class="select" name="status">
                        <option value="">select status</option>
                        <option value="1">active</option>
                        <option value="0">inactive</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg mb-1">Submit</button>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        @if(permission_check('create_roles'))
          <div class="row">
            <div class="col-md-8">
                <h4>Role Manage</h4>
                  <table class="table">
                      <tr>
                        <td>#</td>
                        <td>name</td>
                        <td>slug</td>
                        <td>status</td>   
                        @if(permission_check('update_roles'))
                            <th scope="col">{{ __('action') }}</th>
                        @endif
                      </tr>
                      @foreach($roles as $role)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                                {{$role->name}}
                            </td>
                            <td>
                                {{$role->slug}}
                            </td>
                            <td>{{ ($role->status==1)?'active':'inactive0'}}</td>
                            <td>
                            <span>
                                <button class="btn btn-info"><a href="{{ route('admin.role-create') }}" class="mr-4" data-toggle="tooltip" data-placement="top" title="Edit">
                                    Add Role
                                </button>
                                </a>
                                <a href="{{ route('admin.role-edit',$role->id) }}" class="mr-4" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="fa fa-pencil color-muted"></i>
                                </a>
                                <form action="" class="delete-form" method="post" id="delete" data-yes={{ __('yes') }} data-cancel="{{ __('cancel') }}" data-title="{{ __('delete_role') }}" >
                                    <button type="submit" class="action-btn"   data-toggle="tooltip"
                                        data-placement="top" title="Close"><i
                                            class="fa fa-close color-danger"></i>
                                    </button>
                                </form>
                            </span>
                        </td>
                        </tr>
                      @endforeach
                  </table>
              </div> 
          </div>
        @endif
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>