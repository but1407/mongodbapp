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
                    <input type="text" name="name" class="form-control" id="menu" value="{{ $menu->name }}"
                        placeholder="input name dashboard">
                </div>

                <div class="form-group">
                    <label>Dashboard</label>
                    <select class="form-control" name="parent_id" id="">
                        <option value="0" {{ $menu->parent_id == 0 ? 'selected' : '' }}>
                            father Dashboard
                        </option>
                        @foreach ($menus as $menuParent)
                            <option value="{{ $menuParent->id }}"
                                {{ $menu->parent_id == $menuParent->id ? 'selected' : '' }}>
                                {{ $menuParent->name }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group">
                    <label>Description short</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $menu->description }}
                    </textarea>
                </div>

                <div class="form-group">
                    <label>Description detail</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ $menu->content }}
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="">Accept</label>

                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" value="1" type="checkbox" id="active" name="active"
                            onchange="uncheckOtherCheckboxes('active')" {{ $menu->active == 1 ? 'checked=""' : '' }}>
                        <label for="active" class="custom-control-label">Yes</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" value="0" type="checkbox" id="no_active" name="active"
                            onchange="uncheckOtherCheckboxes('no_active')" {{ $menu->active == 0 ? 'checked=""' : '' }}>
                        <label for="no_active" class="custom-control-label">No</label>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Edit Dashboard</button>
            </div>
        </form>
    </div>
@endsection
