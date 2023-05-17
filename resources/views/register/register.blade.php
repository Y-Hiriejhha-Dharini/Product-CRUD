<x-layout>
    <div class="row col-md-6 mx-auto my-5">
        <form action="register/register" method="POST" class="bg-secondary bg-gradient bg-opacity-10 p-5 rounded">
            <h2 class="text-center">Register</h2>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name" required>
                @error('name')
                    <p>{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Enter Email" required>
                @error('email')
                    <p>{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="contact_no" class="form-label">Contact No</label>
                <input type="text" class="form-control" id="contact_no" placeholder="Enter Contact No" required>
                @error('contact_no')
                    <p>{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="home_address" class="form-label">Home Address</label>
                <input type="text" class="form-control" id="home_address" placeholder="Enter Home Address" required>
                @error('home_address')
                    <p>{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter Password" required>
                @error('password')
                    <p>{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" placeholder="Enter Confirm Password" required>
                @error('confirm_password')
                    <p>{{$message}}</p>
                @enderror
            </div>
            <div class="col-12 my-4">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
</x-layout>