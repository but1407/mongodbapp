<div class="" style="width:600px; margin:0 auto">
    <div class="" style="text-align:center">
        <h2>Xin chao {{ $customer->name }}</h2>

        <p>nhan nut kich hoat di</p>
        <p>
            <a href="{{ route('users.getPass', [
                'customer' => $customer->_id,
                'token' => $customer->token,
            ]) }}"
                style="display: inline-block; background: green; color:#fff; padding:7px 25px; font-weight:bold">
                Dat lai mat khau
            </a>
        </p>
    </div>


</div>
