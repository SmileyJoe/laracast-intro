@if($errors->has($inputName))
    <div>
        <p class="error">{{ $errors->first($inputName) }}</p>
    </div>
@endif