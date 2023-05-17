<x-layout>
    <div class="row col-md-6 mx-auto my-5">
        @if (session()->has('error'))
            <div class="bg-blue-400 bottom-3 fixed-bottom px-4 py-2 right-3 rounded text-sm text-white">
                <p>{{session('error')}}</p>
            </div>
        @endif
        <form action="/register/store" method="POST" class="bg-secondary bg-gradient bg-opacity-10 p-5 rounded">
            @csrf
            <h2 class="text-center fw-bold">REGISTER</h2>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" value="{{old('name')}}" name="name" class="form-control" id="name" placeholder="Enter Name" required>
                @error('name')
                    <p class="text-danger fs-6 text mt-2">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" value="{{old('email')}}" name="email" class="form-control" id="email" placeholder="Enter Email" required>
                @error('email')
                    <p class="text-danger fs-6 text mt-2">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="contact_no" class="form-label">Contact No</label>
                <input type="text" class="form-control"  name="contact_no" value="{{old('contact_no')}}" id="contact_no" placeholder="Enter Contact No" required>
                @error('contact_no')
                    <p class="text-danger fs-6 text mt-2">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="home_address" class="form-label">Home Address</label>
                <input type="text" class="form-control" name="home_address" value="{{old('home_address')}}" id="home_address" placeholder="Enter Home Address" required>
                @error('home_address')
                    <p class="text-danger fs-6 text mt-2">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required>
                @error('password')
                    <p class="text-red-600 fs-6 text mt-2">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="confirm_password" placeholder="Enter Confirm Password" required>
                @error('confirm_password')
                    <p class="text-red-600 fs-6 text mt-2">{{$message}}</p>
                @enderror
            </div>
            <div class="col-12 my-4">
                <button type="submit" class="btn btn-primary">REGISTER</button>
                <button type="reset" class="btn btn-warning">CANCEL</button>
            </div>
        </form>
    </div>
</x-layout>