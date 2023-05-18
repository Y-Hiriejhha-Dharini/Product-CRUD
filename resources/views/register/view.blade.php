<x-layout>
    <x-nav/>
        @if (session()->has('success'))
            <script>
                Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your Work Done',
                showConfirmButton: false,
                timer: 2500
            })
            </script>
        @endif
    <div class="row col-md-10 mx-auto my-5">
        <div class="row col-md-10 mx-auto my-5">
            <form id="form_data" action="/register/user_add" method="POST" onsubmit="saveform(event)" class="bg-secondary bg-gradient bg-opacity-10 p-5 rounded">
                @csrf
                <h2 class="text-center fw-bold">ADD USER</h2>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" value="{{old('name')}}" name="name" class="form-control" id="name" placeholder="Enter Name" required>
                    @error('name')
                        <p class="text-danger fs-6 text mt-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" required>
                    @error('email')
                        <p class="text-danger fs-6 text mt-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address" required>
                    @error('address')
                        <p class="text-danger fs-6 text mt-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-12 my-4">
                    <button type="submit" class="btn btn-primary">ADD</button>
                </div>
            </form>
        </div>

        <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Activities</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users_details as $user)
                    <tr>
                        <input type="hidden" value="{{$user->id}}"  name="id" id="id">
                        <td><input type="text" style="border:none; background: transparent;" value="{{$user->name}}" name="name" id="name"></td>
                        <td><input type="text" style="border:none; background: transparent;" value="{{$user->email}}" name="email" id="email"></td>
                        <td><input type="text" style="border:none; background: transparent;" value="{{$user->address}}" name="address" id="home_address"></td>
                        <td>
                            <button type="submit" onclick="editproduct({{$user->id}})" class="btn btn-warning mx-2">EDIT</button>
                            <button type="submit" onclick="deleteproduct({{$user->id}})" class="btn btn-danger mx-2">DELETE</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>

            <div class="d-flex">
                {!! $users_details->links() !!}
            </div>
          </table>
    </div>
    <script>
        let APP_URL = "{{url('/')}}";
        function saveform(e)
        {
            // e.preventDefault(); 
            console.log($('#id').val());
            $.ajaxSetup({
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: APP_URL + "/register/user_add",
                data: { 
                        id: $('#id').val() ? $('#id').val() : 0,
                        name: $('#name').val(),
                        email: $('#email').val(),
                        address: $('#address').val(),
                    },
                success: function(data) {
                    console.log(data);
                }
            });

        }
        function editproduct(id)
        {
            $.ajax({
                url: APP_URL + "/register/user_edit/"+id,
                success: function(d) {
                    console.log(d);
                     $('#name').val(d.name);
                     $('#email').val(d.email);
                     $('#address').val(d.address);
                     $("#form_data").append('<input type="hidden" name="id" value='+d.id+'>');
                }
            });
        }
        function deleteproduct(id)
        {
            Swal.fire({
            title: 'Do you want to delete?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                url: APP_URL + "/register/user_delete/"+id,
                success: function(data) {
                }
            });
            }
            })
        }

        function checkDetails(event)
        {
            event.preventDefault();
            $.ajax({
                url: APP_URL + "/register/search/"+$('#search').val(),
                success: function(data) {
                    console.log(data[0]);
                        $('tbody').html(data);
                }
            });
        }
    </script>
</x-layout>