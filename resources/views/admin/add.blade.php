<form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <div>
            <label>Account name new</label>
            <input type="text" name="name" id="menu" placeholder="input name account">
        </div>
        <div>
            <label>Password new</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label>email</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label>IMaGe</label>
            <input type="file" name="file_upload">
        </div>

        <div>
            <button type="submit">Create account</button>
        </div>
</form>
