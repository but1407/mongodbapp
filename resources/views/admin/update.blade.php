<head>
    @extends('admin.head')
</head>
<form action="{{ route('update') }}" method="post">
    @csrf
    <div>
        @error('msg')
            <span style="color:red">{{ $messages }}</span>
        @enderror
        <div>
            <label> name update</label>
            <input type="text" name="name" value="{{ $tuanbut->name }}">
            @error('name')
                <span style="color:red">{{ $messages }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="">Password update</label>
        <input type="password" name="password" value="{{ $tuanbut->name }}">
        <input type="hidden" name="id" value="{{ $tuanbut->_id }}">
        @error('password')
            <span style="color:red">{{ $messages }}</span>
        @enderror

    </div>
    <div>
        <button type="submit">update</button>
    </div>
</form>
