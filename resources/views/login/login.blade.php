<x-layout>
    <div class="row col-md-6 mx-auto my-5">
        <form action="login/login" method="POST" class="bg-secondary bg-gradient bg-opacity-10 p-5 rounded">
            <h2 class="text-center">Login</h2>
            <div class="mb-3">
                <label for="name" class="form-label">Email</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter Passsword">
            </div>
            <div class="col-12 my-4">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</x-layout>