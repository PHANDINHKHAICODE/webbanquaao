<!-- HEADER -->
<div class="top-bar">
    <div class="content-topbar flex-sb-m h-full container">
        <div class="left-top-bar">
            Hè năng động cùng Coolmate tặng ngay voucher 299k
        </div>

        <div class="right-top-bar flex-w h-full">
            <a href="{{ route('help') }}" class="flex-c-m trans-04 p-lr-25">Trợ giúp</a>

            <li class="nav-item dropdown no-arrow flex-c-m trans-04 p-lr-25">
                <a href="#" class="nav-link dropdown-toggle" id="userDropdown" data-toggle="dropdown">
                    Tài khoản
                </a>

                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" style="z-index:9999; position:relative;">
                    @if(Auth::user())
                        <a class="dropdown-item"><span>{{ Auth::user()->name }}</span></a>
                        <a class="dropdown-item" href="/thongtindonhang">Đơn hàng của tôi</a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="POST">@csrf @method('DELETE')
                            <button class="dropdown-item">Đăng xuất</button>
                        </form>
                    @else
                        <form action="{{ route('login') }}" method="GET">@csrf
                            <button type="submit" class="dropdown-item">Đăng nhập</button>
                        </form>
                        <form action="{{ route('register') }}" method="GET">@csrf
                            <button type="submit" class="dropdown-item">Đăng ký</button>
                        </form>
                    @endif
                </div>
            </li>

            <a href="#" class="flex-c-m trans-04 p-lr-25">Ngôn ngữ</a>
        </div>
    </div>
</div>

<div class="wrap-menu-desktop">
    <nav class="limiter-menu-desktop container">

        <!-- Logo -->
        <a href="/" class="logo">
            <img src="https://www.coolmate.me/images/logo-coolmate-new.svg?v=1" alt="IMG-LOGO">
        </a>

        <!-- Menu -->
        <div class="menu-desktop">
            <ul class="main-menu" style="margin-left:-50px">
                <li><a href="/trangchu">Trang chủ</a></li>
                <li>
                    <a href="/trangchu">Danh mục</a>
                    <ul class="sub-menu">

                        @foreach($showdanhmuc as $item)
                            <li><a href="#">{{ $item->ten_danh_muc }}</a></li>

                        @foreach ($showdanhmuc as $item)
                        <li><a href="{{ route('san_pham.by_category', $item->ma_danh_muc) }}">{{$item -> ten_danh_muc}}</a></li>

                        @endforeach
                    </ul>
                </li>
                <li><a href="/sanphamuser">Sản phẩm</a></li>
                <li><a href="{{ route('userblog') }}">Blog</a></li>
                <li><a href="/about">Tìm hiểu</a></li>
                <li><a href="/lienhe">Liên hệ</a></li>
            </ul>
        </div>

        <!-- ICONS -->
        <div class="wrap-icon-header flex-w flex-r-m">

<!-- Icon kính lúp -->
        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
            <i class="zmdi zmdi-search"></i>
        </div>

        <!-- Modal Search Ẩn -->
        <div id="modal-search" class="dis-none">
            <form action="{{ route('search.result') }}" method="GET" class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input id="search-input" class="plh3" type="text" name="search" placeholder="Nhập từ khóa...">
            </form>
        </div>




            <!-- Cart -->
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                data-notify="{{ count((array) session('cart')) }}">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>

            <!-- Wishlist -->
            <a id="wishlist-icon"
            href="javascript:void(0)"
            onclick="handleWishlistClick()"
            class="dis-block icon-header-item cl2 hov-cl1 trans-04 icon-header-noti"
            data-notify="0">
                <i class="zmdi zmdi-favorite-outline"></i>
            </a>

    </nav>
</div>


<!-- ============================
        WISHLIST MODAL
=============================== -->
<script>
    window.isLoggedIn = {{ Auth::check() ? 'true' : 'false' }};
    window.loginUrl = "{{ route('login') }}";
</script>

<script>
function checkLogin(event) {
    @if(!Auth::check())
        event.preventDefault();
        alert("Bạn phải đăng nhập để yêu thích sản phẩm!");
        window.location.href = "{{ route('login') }}";
        return false;
    @endif
    return true;
}
</script>
<style>
    #wishlist-modal {
        position: fixed;
        top: 0;
        right: -350px;
        width: 350px;
        height: 100%;
        background: #fff;
        z-index: 2000;
        padding: 20px;
        overflow-y: auto;
        transition: 0.4s ease;
        box-shadow: 0 0 15px rgba(0,0,0,0.25);
    }

    #wishlist-modal.show {
        right: 0;
    }

    #modal-search { 
    position: fixed;
    top:0; left:0;
    width:100%; height:100%;
    background: rgba(0,0,0,0.5); /* overlay mờ */
    display:flex; justify-content:center; align-items:center;
    z-index:9999;
}

#modal-search.dis-none { display:none; }

.wrap-search-header {
    background:#fff;
    padding:20px;
    border-radius:10px;
    width:80%;
    max-width:600px;
}

</style>

<div id="wishlist-modal">
    <h4 class="mtext-109 cl2 p-b-30 flex-sb-m">
        <span>Danh sách yêu thích</span>
        <span id="close-wishlist" style="cursor:pointer;font-size:22px;">✕</span>
    </h4>

    <ul id="wishlist-items" class="header-cart-wrapitem w-full"></ul>
</div>


<!-- ============================
            SCRIPT
=============================== -->
<script>
document.addEventListener("DOMContentLoaded", () => {

    let wishlist = JSON.parse(localStorage.getItem("wishlist") || "[]");

    function updateWishlistCount() {
        const icon = document.getElementById("wishlist-icon");
        if (!window.isLoggedIn) {
            icon.setAttribute("data-notify", 0);
            return;
        }
        icon.setAttribute("data-notify", wishlist.length);
    }

    function renderWishlist() {
        const container = document.getElementById("wishlist-items");
        container.innerHTML = "";

        if (wishlist.length === 0) {
            container.innerHTML = "<p>Chưa có sản phẩm yêu thích.</p>";
            return;
        }

        wishlist.forEach(item => {
            container.innerHTML += `
                <li class="header-cart-item flex-w flex-t m-b-12" style="position:relative;">

                    <!-- nút X nhỏ góc trên phải -->
                    <span class="remove-wishlist-btn" 
                          data-id="${item.id}" 
                          style="position:absolute;top:5px;right:5px;cursor:pointer;color:red;font-weight:bold;">
                        ×
                    </span>

                    <div class="header-cart-item-img">
                        <a href="${item.url}">
                            <img src="${item.img}" alt="${item.name}">
                        </a>
                    </div>

                    <div class="header-cart-item-txt p-t-8">
                        <a href="${item.url}" 
                           class="header-cart-item-name m-b-8 hov-cl1 trans-04" 
                           style="font-size:16px;">
                            ${item.name}
                        </a>
                        <a href="${item.url}" class="stext-103 cl3 hov-cl1">
                            Xem chi tiết →
                        </a>
                    </div>
                </li>
            `;
        });

        // Gắn sự kiện xóa + confirm
        document.querySelectorAll(".remove-wishlist-btn").forEach(btn => {
            btn.onclick = function () {
                const id = this.dataset.id;
                const confirmDelete = confirm("Bạn có chắc muốn xóa sản phẩm khỏi danh sách yêu thích?");
                if (confirmDelete) {
                    wishlist = wishlist.filter(i => i.id != id);
                    localStorage.setItem("wishlist", JSON.stringify(wishlist));
                    updateWishlistCount();
                    renderWishlist();

                    // Đồng bộ icon trái tim trên trang
                    const heart = document.querySelector(`.favorite-btn[data-id='${id}']`);
                    if (heart) heart.classList.remove("active");
                }
            };
        });
    }

    document.getElementById("wishlist-icon").onclick = (e) => {
        e.preventDefault();

        if (!window.isLoggedIn) {
            alert("Bạn phải đăng nhập để xem danh sách yêu thích!");
            window.location.href = window.loginUrl;
            return;
        }

        document.getElementById("wishlist-modal").classList.add("show");
    };

    document.getElementById("close-wishlist").onclick = () => {
        document.getElementById("wishlist-modal").classList.remove("show");
    };

    document.querySelectorAll(".favorite-btn").forEach(btn => {
        btn.onclick = function () {

            if (!window.isLoggedIn) {
                alert("Bạn phải đăng nhập để yêu thích sản phẩm!");
                window.location.href = window.loginUrl;
                return;
            }

            const id = this.dataset.id;
            const name = this.dataset.name;
            const img = this.dataset.img;
            const url = this.dataset.url;

            let exists = wishlist.find(i => i.id == id);

            if (!exists) {
                wishlist.push({ id, name, img, url });
                this.classList.add("active");
            } else {
                wishlist = wishlist.filter(i => i.id != id);
                this.classList.remove("active");
            }

            localStorage.setItem("wishlist", JSON.stringify(wishlist));
            updateWishlistCount();
            renderWishlist();
        };
    });

    updateWishlistCount();
    renderWishlist();

});
</script>

<script>
    //xuly tim kiem 
document.addEventListener("DOMContentLoaded", () => {

    const searchInput = document.getElementById("search-input");
    const searchBtn = document.querySelector(".panel-search button");

    function searchProduct(keyword) {
        if (!keyword.trim()) return;

        // Nếu muốn gửi request tới Laravel route
        window.location.href = `/sanphamuser?search=${encodeURIComponent(keyword)}`;
        // Route Laravel sẽ nhận param "search" và trả về danh sách sản phẩm
    }

    // Enter
    searchInput.addEventListener("keypress", (e) => {
        if (e.key === "Enter") {
            searchProduct(searchInput.value);
        }
    });

    // Click nút tìm kiếm
    searchBtn.addEventListener("click", () => {
        searchProduct(searchInput.value);
    });

});
//Mo dong model search 
document.querySelector(".js-show-modal-search").onclick = () => {
    document.getElementById("modal-search").classList.remove("dis-none");
};

document.getElementById("modal-search").onclick = (e) => {
    if(e.target.id === "modal-search") {
        document.getElementById("modal-search").classList.add("dis-none");
    }
};

// Xử lý Enter hoặc click nút tìm kiếm
const searchInput = document.getElementById("search-input");
const searchBtn = document.querySelector("#modal-search button");

function searchProduct(keyword) {
    if (!keyword.trim()) return;
    window.location.href = "{{ route('search.result') }}?search=" + encodeURIComponent(keyword);
}

searchInput.addEventListener("keypress", (e) => {
    if(e.key === "Enter") searchProduct(searchInput.value);
});

searchBtn.addEventListener("click", () => searchProduct(searchInput.value));

</script>

<style>
    #wishlist-icon {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    width: 40px;
    height: 40px;
    position: relative;
    padding: 0 !important;
}

/* Fix luôn icon bên trong */
#wishlist-icon i {
    font-size: 22px;
    line-height: 1;
    margin: 0;
    padding: 0;
}
</style>