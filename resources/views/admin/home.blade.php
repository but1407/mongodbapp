<head>
    <title>{{ $title }}</title>
</head>
<h1>{{ $title }}</h1>



<div class="">{{ Session::get('success') }}</div>
<nav>
    <ul data-widget="treeview" role="menu" data-accordion="false">

        <li>
            <ul>
                <li>
                    <a href="{{ route('admin.add') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Account</p>
                    </a>
                </li>

            </ul>
        </li>

    </ul>
</nav>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Password</th>
            <th>email</th>
            <th>image</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($account as $acc)
            <tr>
                <td>{{ $acc->name }}</td>
                <td style="color: rebeccapurple">{{ $acc->password }}</td>
                <td style="color:chocolate">{{ $acc->email }}</td>
                <td><img src="{{ url('/storage') }}/{{ $acc->image }}" width="100px"></td>
                {{-- <td>{{ url('/storage') }}/{{ $acc->image }}</td> --}}
                <td>
                    <a style="color:yellowgreen; text-decoration:none;"
                        href="{{ route('editItem', ['id' => $acc->_id]) }}">
                        edit
                    </a>
                    <a style=" text-decoration:none;" href="{{ route('deleteItem', ['id' => $acc->_id]) }}"
                        onclick="return confirm('really nigga')">
                        delete
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
