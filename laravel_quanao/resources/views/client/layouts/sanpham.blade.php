<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Trang sản phẩm
            </h3>
        </div>

        <div class="flex-w flex-sb-m p-b-52">
            @php
                // Hàm loại bỏ dấu tiếng Việt để dò từ khóa ổn định
                if (!function_exists('vn_str_filter')) {
                    function vn_str_filter($str) {
                        $str = preg_replace('/\s+/', ' ', trim($str));
                        $unicode = array(
                            'a'=>array('á','à','ả','ã','ạ','ă','ắ','ằ','ẳ','ẵ','ặ','â','ấ','ầ','ẩ','ẫ','ậ'),
                            'd'=>array('đ'),
                            'e'=>array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'),
                            'i'=>array('í','ì','ỉ','ĩ','ị'),
                            'o'=>array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'),
                            'u'=>array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'),
                            'y'=>array('ý','ỳ','ỷ','ỹ','ỵ'),
                        );
                        $str = mb_strtolower($str, 'UTF-8');
                        foreach ($unicode as $ascii => $accents) {
                            $str = str_replace($accents, $ascii, $str);
                        }
                        return $str;
                    }
                }

                // Tạo selector cho các nút Nam / Nữ dựa trên danh mục có trong $showdanhmuc
                $maleCats = [];
                $femaleCats = [];
                if (isset($showdanhmuc) && is_iterable($showdanhmuc)) {
                    foreach ($showdanhmuc as $dm) {
                        $name = is_object($dm) ? ($dm->ten_danh_muc ?? '') : (is_array($dm) ? ($dm['ten_danh_muc'] ?? '') : '');
                        $slug = vn_str_filter($name);
                        $class = 'cat-' . (is_object($dm) ? ($dm->ma_danh_muc ?? '') : (is_array($dm) ? ($dm['ma_danh_muc'] ?? '') : ''));
                        if ($slug !== '' && strpos($slug, 'nam') !== false) $maleCats[] = $class;
                        if ($slug !== '' && (strpos($slug, 'nu') !== false || strpos($slug, 'nu') !== false)) $femaleCats[] = $class;
                    }
                }
                $maleSelector = count($maleCats) ? ('.' . implode(',.', $maleCats)) : '.men';
                $femaleSelector = count($femaleCats) ? ('.' . implode(',.', $femaleCats)) : '.women';
            @endphp

            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <a href="{{ route('sanphamuser') }}" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    Tất cả sản phẩm
                </a>

                @if(isset($showdanhmuc) && is_iterable($showdanhmuc))
                    @foreach($showdanhmuc as $dm)
                        @php
                            $dmId = is_object($dm) ? ($dm->ma_danh_muc ?? '') : ($dm['ma_danh_muc'] ?? '');
                            $dmName = is_object($dm) ? ($dm->ten_danh_muc ?? '') : ($dm['ten_danh_muc'] ?? '');
                        @endphp
                        <a href="{{ route('san_pham.by_category', $dmId) }}" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".cat-{{ $dmId }}">
                            {{ $dmName }}
                        </a>
                    @endforeach
                @endif
            </div>

            <div class="flex-w flex-c-m m-tb-10">
                <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Lựa chọn
                </div>

                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Tìm kiếm
                </div>
            </div>

            <!-- Search product -->
            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <div class="bor8 dis-flex p-l-15">
                    <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>

                    <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
                </div>
            </div>

            <!-- Filter -->
            <div class="dis-none panel-filter w-full p-t-10">
                <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                    <div class="filter-col1 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Sắp xếp theo
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Mặc định
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Phổ biến
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Đánh giá trung bình
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                    Sự mới mẻ
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Giá từ thấp đến cao
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Giá từ cao đến thấp
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col2 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Giá tiền
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                    Tất cả
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    100.000k - 200.000k
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    200.000k - 300.000k
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    400.000k - 500.000k
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    500.000k - 1.000.000k
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    2.000.000k - 3.000.000k
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col3 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Màu sắc
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #222;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    Đen
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                    Xanh
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    Xám
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    Xanh lá cây
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    Đỏ
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
                                    <i class="zmdi zmdi-circle-o"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    Trắng
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col4 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Từ khóa
                        </div>

                        <div class="flex-w p-t-4 m-r--5">
                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Thời trang
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Lifestyle
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Jean
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Phong cách đường phố
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Thủ công
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row isotope-grid">

        @foreach($sanpham as $item)
<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">


    <div class="block2">
        <div class="block2-pic hov-img0">
            <img src="{{ $item->anh_sanpham }}" alt="IMG-PRODUCT">

            <a href="{{ route('san_pham.showdetail', $item->ma_san_pham) }}"
               class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                Chi tiết
            </a>
        </div>

            @php
                // Lấy mã danh mục từ sản phẩm (cả DB::table và Eloquent đều có trường này)
                $maDanhMuc = $item->ma_danh_muc ?? null;
                $tenDanhMuc = '';
                if (isset($showdanhmuc) && is_iterable($showdanhmuc) && $maDanhMuc !== null) {
                    foreach ($showdanhmuc as $dm) {
                        if (isset($dm->ma_danh_muc) && $dm->ma_danh_muc == $maDanhMuc) {
                            $tenDanhMuc = $dm->ten_danh_muc ?? '';
                            break;
                        }
                    }
                }

                // Chuẩn hóa tên để dò từ khóa nam / nữ (dùng mb_strtolower nếu có)
                $lower = function_exists('mb_strtolower') ? mb_strtolower($tenDanhMuc, 'UTF-8') : strtolower($tenDanhMuc);
                $genderClass = '';
                if ($lower !== '' && strpos($lower, 'nam') !== false) {
                    $genderClass = 'men';
                } elseif ($lower !== '' && (strpos($lower, 'nu') !== false || strpos($lower, 'nữ') !== false)) {
                    $genderClass = 'women';
                }

                // Gán class theo mã danh mục để lọc an toàn (không phụ thuộc vào quan hệ Eloquent)
                $catClass = $maDanhMuc !== null ? 'cat-' . $maDanhMuc : 'cat-all';
            @endphp

            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $catClass }} {{ $genderClass }}">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">

                        @php
                            $raw = $item->anh_sanpham ?? '';
                            if (preg_match('/^https?:\/\//', $raw)) {
                                $imgUrl = $raw;
                            } elseif (Str::startsWith($raw, '/')) {
                                $imgUrl = $raw;
                            } else {
                                $imgUrl = asset($raw);
                            }
                        @endphp
                        <img src="{{ $imgUrl }}" alt="IMG-PRODUCT">

                        <a href="{{route ('san_pham.showdetail' , $item -> ma_san_pham)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                            Chi Tiết
                        </a>

                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">

                        <div class="block2-txt-child1 flex-col-l ">

                            <a href="/chitiet" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">

                                {{$item -> ten_san_pham}}

                            </a>
                            <div style="display : flex ; justify-content: space-between;">


                                <span style="text-decoration: line-through;color: #888;padding-right : 25px " class="stext-105 cl3">

                                    {{number_format($item -> gia)}} VNĐ

                                </span>
                                <span class="stext-105 cl3">


        <div class="block2-txt flex-w flex-t p-t-14">

            <div class="block2-txt-child1 flex-col-l">
                <span class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                    {{ $item->ten_san_pham }}
                </span>

                <div style="display:flex; justify-content:space-between;">
                    <span style="text-decoration: line-through; color:#888;" class="stext-105 cl3">
                        {{ number_format($item->gia) }} VNĐ
                    </span>
                    <span class="stext-105 cl3">
                        {{ number_format($item->gia * 0.9) }} VNĐ
                    </span>
                </div>
            </div>

            <!-- HEART ICON -->
            <div class="block2-txt-child2 flex-r p-t-3">
                <i class="favorite-btn zmdi zmdi-favorite-outline"
                   data-id="{{ $item->ma_san_pham }}"
                   data-name="{{ $item->ten_san_pham }}"
                   data-img="{{ $item->anh_sanpham }}"
                   data-url="{{ route('san_pham.showdetail', $item->ma_san_pham) }}"
                   style="font-size:25px; cursor:pointer;">
                </i>
            </div>

        </div>
    </div>

</div>
@endforeach
        </div>

        <!-- Load more -->
        <div class="flex-c-m flex-w w-full p-t-45">
            <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                Xem tiếp
            </a>
        </div>
    </div>
</section>
<script>
    window.isLoggedIn = {{ Auth::check() ? 'true' : 'false' }};
    window.loginUrl = "{{ route('login') }}";

    // Fix kiểu dữ liệu (để không thành chuỗi)
    if (typeof window.isLoggedIn === 'string') {
        window.isLoggedIn = (window.isLoggedIn === 'true');
    }

    console.log("DEBUG isLoggedIn =", window.isLoggedIn);
</script>
<script>
// --- Lấy danh sách từ localStorage ---
function getWishlist() {
    return JSON.parse(localStorage.getItem("wishlist") || "[]");
}

// --- Lưu lại ---
function saveWishlist(data) {
    localStorage.setItem("wishlist", JSON.stringify(data));
}

// --- Cập nhật số tim trên header ---
function updateWishlistCount() {
    document.getElementById("wishlist-icon").setAttribute("data-notify", getWishlist().length);
}

// --- Render danh sách lên popup ---
function renderWishlist() {
    let items = getWishlist();
    let html = "";

    items.forEach(item => {
        html += `
            <div class="header-cart-item flex-w flex-t m-b-12" style="cursor:pointer;"
                 onclick="window.location='${item.url}'">
                <div class="header-cart-item-img">
                    <img src="${item.img}" alt="IMG">
                </div>

                <div class="header-cart-item-txt p-t-8">
                    <a class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                        ${item.name}
                    </a>
                </div>
            </div>
        `;
    });

    document.getElementById("wishlist-items").innerHTML = html;
}

document.querySelectorAll(".favorite-btn").forEach(btn => {
    btn.addEventListener("click", function() {

        // 🔥 KIỂM TRA ĐĂNG NHẬP
        if (!window.isLoggedIn) {
            alert("Bạn phải đăng nhập để yêu thích sản phẩm!");
            window.location.href = window.loginUrl;
            return;
        }
        // 🔥 KẾT THÚC PHẦN KIỂM TRA ----------------------

        let id = this.dataset.id;
        let wishlist = getWishlist();

        let exists = wishlist.find(x => x.id == id);

        if (!exists) {
            wishlist.push({
                id: id,
                name: this.dataset.name,
                img: this.dataset.img,
                url: this.dataset.url
            });

            saveWishlist(wishlist);
            updateWishlistCount();
            renderWishlist();

            this.classList.remove("zmdi-favorite-outline");
            this.classList.add("zmdi-favorite");

        } else {
            // Xóa nếu bấm lại
            wishlist = wishlist.filter(x => x.id != id);
            saveWishlist(wishlist);
            updateWishlistCount();
            renderWishlist();

            this.classList.remove("zmdi-favorite");
            this.classList.add("zmdi-favorite-outline");
        }
    });
});


// --- Hiện popup khi bấm icon tim trên header ---
document.getElementById("wishlist-icon").addEventListener("click", function() {
    document.getElementById("wishlist-panel").classList.add("show-header-cart");
});

// --- Ẩn popup ---
document.querySelectorAll(".js-hide-wishlist").forEach(btn => {
    btn.addEventListener("click", function() {
        document.getElementById("wishlist-panel").classList.remove("show-header-cart");
    });
});

// --- Load khi mở trang ---
updateWishlistCount();
renderWishlist();


</script>
