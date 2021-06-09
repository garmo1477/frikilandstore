@if ($errors->any())
    <div class="form-errors">
        @foreach ($errors->all() as $error )
            <p class="bg-danger text-white p-2">{{ $error }}</p>
        @endforeach
    </div>    
@endif