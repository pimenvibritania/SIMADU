<form method="POST" action="{{route('sandbox.store')}}">
    @csrf
    <label>
        NAME
        <input type="text" name="name"/>
    </label>
    <button type="submit">submit</button>
</form>
@if ($errors->has('name'))
    <span class="text-danger">{{ $errors->first('name') }}</span>
@endif
