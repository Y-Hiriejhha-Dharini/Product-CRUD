<x-layout>
    <div class="row col-md-6 mx-auto my-5">
        <form action="login/login" method="POST" class="bg-secondary bg-gradient bg-opacity-10 p-5 rounded">
            @csrf
            <h2 class="text-center fw-bold">LOGIN</h2>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" value="{{old('email')}}" name="email" class="form-control" id="email" placeholder="Enter Email" required>
                @error('email')
                    <p class="text-danger fs-6 text mt-2">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Pasword</label>
                <input type="password" name="password" class="form-control" id="email" placeholder="Enter Password" required>
                @error('password')
                    <p class="text-danger fs-6 text mt-2">{{$message}}</p>
                @enderror
            </div>
            <div class="col-12 my-4">
                <button type="submit" class="btn btn-primary">LOGIN</button>
            </div>
        </form>
    </div>
</x-layout>