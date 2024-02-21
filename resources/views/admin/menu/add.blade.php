@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <script>
        function uncheckOtherCheckboxes(checkboxId) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                if (checkbox.id !== checkboxId) {
                    checkbox.checked = false;
                }
            });
        }
    </script>
    <div class="card card-primary">

        <form action="" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Dashboard name</label>
                    <input type="text" name="name" class="form-control" id="menu" placeholder="input name dashboard">
                </div>

                <div class="form-group">
                    <label>Dashboard</label>
                    <select class="form-control" name="parent_id" id="">
                        <option value="0">father Dashboard</option>
                        @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group">
                    <label>Description short</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label>Description detail</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="">Accept</label>

                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" value="1" type="checkbox" id="active" name="active"
                            onchange="uncheckOtherCheckboxes('active')">
                        <label for="active" class="custom-control-label">Yes</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" value="0" type="checkbox" id="no_active" name="active"
                            onchange="uncheckOtherCheckboxes('no_active')">
                        <label for="no_active" class="custom-control-label">No</label>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create Dashboard</button>
            </div>
        </form>
    </div>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
