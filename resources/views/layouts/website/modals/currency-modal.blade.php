<div id="currencyModal" class="deluxe-calc-overlay">
    <div class="calc-glass-vault shadow-lg">
        <div class="calc-inner-border">

            <div class="calc-header-pro">
                <button class="close-btn-x" onclick="toggleCurrencyModal()">&times;</button>
            </div>

            <div class="calc-content">
                <h4 class="calc-main-title">المحول الذكي</h4>

                <div class="input-vault-group mb-4">
                    <label>المبلغ الأساسي (SAR)</label>
                    <div class="vault-input-wrapper">
                        <i class="bi bi-cash-coin icon-gold"></i>
                        <input type="number" id="baseAmount" oninput="convertCurrency()" placeholder="0.00">
                    </div>
                </div>

                <div class="swap-visual-divider">
                    <div class="dot-line"></div>
                    <div class="icon-swap"><i class="bi bi-arrow-down-up"></i></div>
                    <div class="dot-line"></div>
                </div>

                <div class="input-vault-group mb-4">
                    <label>التحويل إلى</label>
                    <div class="vault-select-wrapper position-relative">
                        <select id="targetCurrency" onchange="convertCurrency()" class="premium-select">
                            <option value="AED">درهم إماراتي (AED)</option>
                            <option value="USD">دولار أمريكي (USD)</option>
                            <option value="EUR">يورو (EUR)</option>
                            <option value="JOD">دينار أردني (JOD)</option>
                            <option value="EGP">جنيه مصري (EGP)</option>
                            <option value="ILS">شيكل إسرائيلي (ILS)</option>
                            <option value="SAR">ريال سعودي (SAR)</option>
                        </select>
                        <i class="bi bi-chevron-down custom-select-arrow"></i>
                    </div>
                </div>

                <div class="premium-display-card">
                    <span class="label-tiny">المبلغ التقديري</span>
                    <div class="d-flex align-items-baseline justify-content-center gap-2 mt-2">
                        <h2 id="convertedResult" class="res-num">0.00</h2>
                        <span id="currencyCode" class="res-code">AED</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
