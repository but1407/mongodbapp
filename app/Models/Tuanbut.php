<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
class Tuanbut extends Eloquent
{
    use HasFactory;
    protected $collection = 'tuanbuts';
    protected $connection = 'mongodb';
    use SoftDeletes;
    protected $fillable = [
        '_id',"\$oid","data","POId","MaDonVi", "MaDonVi",
 "SoChungTu",
 "LoaiGiaoDich",
 "MaKhoXuat",
 "MaKhoNhap",
 "MaDoiTacKD",
 "NgayChuyenHang",
 "NgayCapNhat",
 "TrangThaiCT",
 "Products",
 "Line",
 "MaSPNCC",
 "SanPham",
 "SoLuong",
 "DVT",
 "SLTheoDVTCoBan",
 "DVTCoBan",
 "Ke",
 "DongiaChuaVAT",
 "ThanhTienChuaVAT",
 "DonGiaCoVAT",
 "ThanhTienCoVAT",
 "ThueVAT",
 "info",
 "is_object",
 "file_id",
 "folder",
 "action",
 "supplier",
 "hash_key",
 "filename",
 "path",
 "date_time_file",
 "province_code",
 "district_code",
 "ward_code",
 "poscode",
 "created_at",
"\$date",
"\$numberLong",
 "updated_at",
"\$date",
"\$numberLong",

    ];
}