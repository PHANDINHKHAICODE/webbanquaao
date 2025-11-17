@extends('client.layouts.master')

@section('content')

<style>
    /* ===== FIX ĐÈ LÊN HEADER ===== */
    body {
        padding-top: 120px !important; /* tùy độ cao header */
    }

    header {
        z-index: 9999;
        position: fixed;
        width: 100%;
        top: 0;
        left: 0;
    }

    /* ===== STYLE SEARCH ===== */
    .search-title { 
        font-size: 22px; 
        font-weight: 600; 
        margin-bottom: 10px;
    }

    .search-key { 
        font-weight: 700; 
        color: #e74c3c; 
    }

    .result-count { 
        font-size: 14px; 
        color: #555; 
    }

    /* Card sản phẩm */
    .block2 { 
        border: 1px solid #eee; 
        border-radius: 8px; 
        transition: 0.3s; 
        background: #fff;
    }

    .block2:hover { 
        box-shadow: 0 2px 12px rgba(0,0,0,0.15); 
        transform: translateY(-3px);
    }

    .block2-pic { 
        overflow: hidden; 
        border-radius: 8px; 
        position: relative; 
    }

    .block2-pic img { 
        transition: transform 0.3s ease; 
        width: 100%; 
        height: 260px; 
        object-fit: cover;
    }

    .block2-pic:hover img { 
        transform: scale(1.05); 
    }

    .block2-btn { 
        position: absolute; 
        top: 50%; 
        left: 50%; 
        transform: translate(-50%, -50%); 
        opacity: 0; 
        transition: opacity 0.3s;
    }

    .block2-pic:hover .block2-btn { 
        opacity: 1; 
    }
</style>

<section class="bg0 p-t-23 p-b-140">
    <div class="container">

        <!-- Header tìm kiếm -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="search-title">
                Kết quả tìm kiếm cho: <span class="search-key">{{ $query }}</span>
            </h4>

            @if(count($sanpham) > 0)
            <span class="result-count">{{ count($sanpham) }} sản phẩm</span>
            @endif
        </div>

        <!-- Danh sách sản phẩm -->
        <div class="row isotope-grid">
            @forelse($sanpham as $item)
            <div class="col-6 col-md-4 col-lg-3 mb-4 isotope-item">
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="{{ $item->anh_sanpham }}" alt="{{ $item->ten_san_pham }}">

                        <a href="{{ route('san_pham.showdetail', $item->ma_san_pham) }}"
                           class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                            Chi tiết
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l">
                            <span class="stext-104 cl4 js-name-b2 p-b-6">
                                {{ $item->ten_san_pham }}
                            </span>

                            <div class="d-flex justify-content-between">
                                <span class="stext-105 cl3" style="text-decoration: line-through; color:#888;">
                                    {{ number_format($item->gia) }} VNĐ
                                </span>
                                <span class="stext-105 cl3">
                                    {{ number_format($item->gia * 0.9) }} VNĐ
                                </span>
                            </div>
                        </div>

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
            @empty
            <div class="col-12 text-center mt-5">
                <p class="text-muted fs-5">
                    Không có sản phẩm nào phù hợp với từ khóa 
                    "<strong>{{ $query }}</strong>"
                </p>
            </div>
            @endforelse
        </div>

    </div>
</section>

@endsection
