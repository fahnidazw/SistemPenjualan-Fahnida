<style>
.footer-section {
    position: relative;
    background: #3B2A20;
    padding: 60px 0 45px;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    box-shadow: 0 -4px 20px rgba(59, 42, 32, 0.3);
    overflow: hidden;
    color: #fff;
}

.footer-section::before {
    content: "";
    position: absolute;
    inset: 0;
    background: url('https://images.unsplash.com/photo-1602874801007-bd458bb1b8b6?auto=format&fit=crop&q=80&w=1500') center/cover no-repeat;
    opacity: 0.08;
    z-index: 0;
}

.footer-row {
    display: flex;
    align-items: stretch;
    position: relative;
    z-index: 1; /* agar konten di atas gambar */
}

.footer-card {
    background: rgba(255,255,255,0.95);
    color: #3B2A20;
    padding: 32px;
    border-radius: 20px;
    height: 100%;
    box-shadow: 0 10px 28px rgba(59, 42, 32, 0.16);
    display: flex;
    flex-direction: column;
}

.footer-title {
    font-weight: 800; 
    text-transform: uppercase;
    margin-bottom: 25px;
    font-size: 1.4rem; 
    letter-spacing: 1.2px;
    color: #3B2A20;
}

.footer-card p,
.footer-card li,
.footer-card td {
    color: #4A3A30;
    font-size: 15px;
    line-height: 1.6;
}

.footer-card-content {
    flex-grow: 1;
}

.footer-icon {
    background: #A38A75;
    color: #3B2A20;
    width: 42px;
    height: 42px;
    line-height: 42px;
    border-radius: 50%;
    text-align: center;
    margin-right: 10px;
    transition: 0.3s;
    display: inline-block;
}

.footer-icon:hover {
    background: #3B2A20;
    color: #fff;
    transform: translateY(-4px);
}

.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 10px;
}

.footer-links i {
    color: #A38A75;
    width: 22px;
    margin-right: 6px;
}

.footer-hours td {
    border: none;
    padding: 6px 8px;
}

.footer-bottom {
    background: #fff;
    padding: 18px;
    text-align: center;
    font-size: 14px;
    color: #3B2A20;
    border-top: 1px solid rgba(163, 138, 117, 0.2);
}

@media (max-width: 768px) {
    .footer-row {
        display: block;
    }

    .footer-card {
        margin-bottom: 25px;
    }
}
</style>

    <div class="footer-section">
        <div class="container">
            <div class="row footer-row">

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-card">
                        <div class="footer-card-content">
                            <h4 class="footer-title">About Lumora</h4>
                            <p>
                                Lumora menghadirkan lilin aromaterapi yang menenangkan, dan
                                membawa kenyamanan dan kehangatan di setiap sudut ruangan.
                            </p>
                        </div>

                        <div>
                            <a href="#" class="footer-icon"><i class="fab fa-tiktok"></i></a>
                            <a href="#" class="footer-icon"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="footer-icon"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-card">
                        <div class="footer-card-content">
                            <h4 class="footer-title">Contact Us</h4>
                            <ul class="footer-links">
                                <li><i class="fas fa-map-marker-alt"></i> Lunareth, Celestia Avenue</li>
                                <li><i class="fas fa-envelope"></i> Lumora@gmail.com</li>
                                <li><i class="fas fa-phone"></i> +00 137 782 82</li>
                                <li><i class="fas fa-print"></i> +00 783 011 76</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="footer-card">
                        <div class="footer-card-content">
                            <h4 class="footer-title">Opening Hours</h4>
                            <table class="table footer-hours">
                                <tr><td>Mon - Thu</td><td>7am - 11pm</td></tr>
                                <tr><td>Fri - Sat</td><td>8am - 11pm</td></tr>
                                <tr><td>Sunday</td><td>9am - 12pm</td></tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<div class="footer-bottom">
    © 2026 <strong>Lumora</strong> — All Rights Reserved
</div>
