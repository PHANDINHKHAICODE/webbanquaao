<!-- help.blade.php -->
@extends('layouts.app')

@section('content')
<style>
    .help-header {
        background: #f5f7ff;
        padding: 80px 20px;
        text-align: center;
    }

    .help-title {
        font-size: 42px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .help-desc {
        font-size: 18px;
        color: #666;
        margin-bottom: 35px;
    }

    /* SEARCH BAR FIXED CENTER */
    .help-search {
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .help-search input {
        width: 50%;
        max-width: 520px;
        padding: 15px 20px;
        border-radius: 12px;
        border: 1px solid #c7c7c7;
        font-size: 18px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transition: 0.2s;
    }

    .help-search input:focus {
        outline: none;
        border-color: #5a7cff;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
    }

    /* GRID CATEGORY CARDS */
    .help-cards {
        margin-top: 50px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 25px;
    }

    .help-card {
        padding: 25px;
        background: white;
        border-radius: 22px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.08);
        text-align: center;
        font-size: 18px;
        font-weight: 600;
        transition: 0.3s;
        cursor: pointer;
    }

    .help-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 26px rgba(0, 0, 0, 0.12);
    }

    /* FAQ */
    .faq-item {
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        margin-bottom: 15px;
    }

    .faq-question {
        font-size: 18px;
        cursor: pointer;
        font-weight: 600;
    }

    .faq-answer {
        display: none;
        color: #666;
        margin-top: 10px;
        line-height: 1.6;
    }
</style>


<div class="help-header">
    <h1>Trung Tâm Trợ Giúp</h1>
    <p>Tìm câu trả lời hoặc nhận hỗ trợ trực tiếp từ chúng tôi</p>

    <div class="help-search">
        <input type="text" placeholder="Tìm kiếm: đơn hàng, đổi trả, thanh toán…">
    </div>
</div>

<div class="container mt-5">

    <h2 class="mb-4">Danh mục hỗ trợ</h2>

    <div class="help-cards">
        <div class="help-card">🛒 Hướng dẫn mua hàng</div>
        <div class="help-card">💳 Thanh toán</div>
        <div class="help-card">🚚 Giao hàng</div>
        <div class="help-card">📦 Theo dõi đơn</div>
        <div class="help-card">🔁 Đổi trả & Hoàn tiền</div>
        <div class="help-card">❓ Câu hỏi thường gặp</div>
    </div>

    <br><br>

    <h2>Câu hỏi thường gặp</h2>

    <div class="faq-item">
        <div class="faq-question">⭐ Làm sao biết đơn hàng của tôi đang ở đâu?</div>
        <div class="faq-answer">Bạn có thể vào mục *Tài khoản → Đơn hàng* để xem trạng thái vận chuyển.</div>
    </div>

    <div class="faq-item">
        <div class="faq-question">⭐ Bao lâu tôi nhận được hàng?</div>
        <div class="faq-answer">Thông thường từ 2–4 ngày tùy khu vực.</div>
    </div>

    <div class="faq-item">
        <div class="faq-question">⭐ Tôi muốn đổi trả sản phẩm?</div>
        <div class="faq-answer">Bạn được đổi hàng trong 7 ngày nếu còn tag và chưa qua sử dụng.</div>
    </div>
</div>

<script>
    document.querySelectorAll(".faq-question").forEach(q => {
        q.addEventListener("click", () => {
            let ans = q.nextElementSibling;
            ans.style.display = ans.style.display === "block" ? "none" : "block";
        });
    });
</script>

@endsection
