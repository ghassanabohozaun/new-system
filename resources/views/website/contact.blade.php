@extends('layouts.website.app')
@section('title', $title)
@section('content')
    <main class="pb-5">
        <section class="contact-section py-5 bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="contact-form-wrapper bg-white p-4 p-md-5 shadow-sm">
                            <div class="text-center mb-5 position-relative">
                                <div class="contact-header-icon mb-3 mx-auto">
                                    <i class="bi bi-send-fill text-gold fs-3"></i>
                                </div>
                                <p class="text-muted small mb-1">تواصل معنا</p>
                                <h2 class="fw-bold text-navy mb-2">تواصل معنا بكل سهولة</h2>
                                <p class="text-muted small">عبر الواتساب أو النموذج، فريق الدعم معك خطوة
                                    بخطوة لحل أي استفسار.</p>
                            </div>

                            <form action="#" method="POST" class="custom-contact-form">
                                <div class="row g-4 mb-4">
                                    <div class="col-12 text-start">
                                        <label class="form-label text-navy fw-bold small">الخدمة
                                            المطلوبة</label>
                                        <select class="form-select custom-input">
                                            <option selected>الجولات السياحية</option>
                                            <option>تذاكر الطيران</option>
                                            <option>البرامج السياحية</option>
                                        </select>
                                    </div>
                                    <div class="col-12 text-start">
                                        <label class="form-label text-navy fw-bold small">اسم
                                            الرحلة</label>
                                        <select class="form-select custom-input">
                                            <option selected>روما رحلة الكولوسيوم</option>
                                            <option>جولة باريس</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row g-4 mb-4 text-start">
                                    <div class="col-md-6">
                                        <label class="form-label text-navy fw-bold small">(*) الاسم</label>
                                        <input type="text" class="form-control custom-input"
                                            placeholder="ادخل الاسم">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-navy fw-bold small">(*) رقم
                                            الهاتف</label>
                                        <input type="tel" class="form-control custom-input"
                                            placeholder="ادخل رقم الهاتف">
                                    </div>
                                </div>

                                <div class="row g-4 mb-4 text-start">
                                    <div class="col-md-6">
                                        <label class="form-label text-navy fw-bold small">(*) البريد
                                            الالكتروني</label>
                                        <input type="email" class="form-control custom-input"
                                            placeholder="ادخل البريد الالكتروني">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-navy fw-bold small">رقم جواز
                                            السفر</label>
                                        <input type="text" class="form-control custom-input"
                                            placeholder="ادخل رقم جواز السفر">
                                    </div>
                                </div>

                                <div class="row g-4 mb-4 text-start">
                                    <div class="col-md-4">
                                        <label class="form-label text-navy fw-bold small">عدد
                                            البالغين</label>
                                        <input type="number"
                                            class="form-control custom-input custom-number-input"
                                            placeholder="ادخل عدد" min="1">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-navy fw-bold small">عدد
                                            الأطفال</label>
                                        <input type="number"
                                            class="form-control custom-input custom-number-input"
                                            placeholder="ادخل عدد" min="0">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-navy fw-bold small">عدد الرضع</label>
                                        <input type="number"
                                            class="form-control custom-input custom-number-input"
                                            placeholder="ادخل عدد" min="0">
                                    </div>
                                </div>

                                <div class="row g-4 mb-4 text-start">
                                    <div class="col-md-6">
                                        <label class="form-label text-navy fw-bold small">(*)
                                            الجنسية</label>
                                        <select class="form-select custom-input">
                                            <option selected disabled>اختر الجنسية</option>
                                            <option>سعودي</option>
                                            <option>مصري</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-navy fw-bold small">الذهاب
                                            الى</label>
                                        <select class="form-select custom-input">
                                            <option selected disabled>اختر الدولة المراد السفر لها</option>
                                            <option>إيطاليا</option>
                                            <option>فرنسا</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row g-4 mb-5 text-start">
                                    <div class="col-md-6">
                                        <label class="form-label text-navy fw-bold small">تاريخ
                                            الذهاب</label>
                                        <div class="position-relative">
                                            <input type="text"
                                                class="form-control custom-input custom-flatpickr text-muted"
                                                placeholder="اختر تاريخ الذهاب">
                                            <i class="bi bi-calendar3 position-absolute text-muted"
                                                style="left: 15px; top: 50%; transform: translateY(-50%); pointer-events: none;"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-navy fw-bold small">تاريخ
                                            العودة</label>
                                        <div class="position-relative">
                                            <input type="text"
                                                class="form-control custom-input custom-flatpickr text-muted"
                                                placeholder="اختر تاريخ العودة">
                                            <i class="bi bi-calendar3 position-absolute text-muted"
                                                style="left: 15px; top: 50%; transform: translateY(-50%); pointer-events: none;"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="flight-addon-section border-top pt-4 mt-4">
                                    <div
                                        class="form-check form-switch d-flex align-items-center justify-content-start gap-2 mb-4">
                                        <input class="form-check-input custom-switch" type="checkbox"
                                            id="addFlightToggle">
                                        <label class="form-check-label text-navy fw-bold fs-6 mb-0"
                                            for="addFlightToggle">اضف للعرض تذاكر طيران</label>
                                    </div>
                                    <div id="flightDetailsFields" class="d-none">
                                        <div class="row g-4 mb-4 text-start">
                                            <div class="col-md-6">
                                                <label class="form-label text-navy fw-bold small">من
                                                    الدولة</label>
                                                <select class="form-select custom-input">
                                                    <option>اختر الدولة</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label text-navy fw-bold small">من
                                                    المدينة / المطار</label>
                                                <select class="form-select custom-input">
                                                    <option>اسم المدينة - اسم المطار</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row g-4 mb-4 text-start">
                                            <div class="col-md-6">
                                                <label class="form-label text-navy fw-bold small">الى
                                                    الدولة</label>
                                                <select class="form-select custom-input">
                                                    <option>اختر الدولة</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label text-navy fw-bold small">إلى
                                                    المدينة / المطار</label>
                                                <select class="form-select custom-input">
                                                    <option>اسم المدينة - اسم المطار</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row g-4 mb-4 text-start align-items-end">
                                            <div class="col-md-6">
                                                <label class="form-label text-navy fw-bold small">الدرجة
                                                    السياحية</label>
                                                <select class="form-select custom-input">
                                                    <option>اختر الدرجة السياحية</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label
                                                    class="form-label text-navy fw-bold small mb-3">النوع</label>
                                                <div class="d-flex gap-4 p-2 custom-radio-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input custom-radio"
                                                            type="radio" name="flightType" id="direct"
                                                            checked>
                                                        <label class="form-check-label text-muted small"
                                                            for="direct">رحلة مباشرة</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input custom-radio"
                                                            type="radio" name="flightType" id="transit">
                                                        <label class="form-check-label text-muted small"
                                                            for="transit">ترانزيت</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5 text-start mt-4">
                                    <div class="col-12">
                                        <label class="form-label text-navy fw-bold small">هل لديك
                                            ملاحظات؟</label>
                                        <textarea class="form-control custom-input" rows="4" placeholder="اكتب ملاحظاتك"></textarea>
                                    </div>
                                </div>

                                <div class="text-center mt-4">
                                    <button type="submit"
                                        class="btn btn-submit-gold btn-dancing px-5 py-3 fw-bold w-50 d-flex align-items-center justify-content-center mx-auto gap-2">
                                        <span>إرسال الطلب</span>
                                        <i class="bi bi-send-fill dancing-icon fs-5"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
