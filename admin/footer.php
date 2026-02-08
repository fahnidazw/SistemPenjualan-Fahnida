<style>
.footer-section {
    position: relative;
    background: linear-gradient(135deg, #F6B7C5, #F5C6A8);
    padding: 60px 0 45px;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    box-shadow: 0 -6px 24px rgba(246,183,197,0.35);
    overflow: hidden;
    color: #5C3A32;
}

.footer-section::before {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        180deg,
        rgba(255,255,255,0.35),
        rgba(255,255,255,0.1)
    );
    z-index: 0;
}

.footer-row {
    display: flex;
    align-items: stretch;
    position: relative;
    z-index: 1;
}

.footer-card {
    background: linear-gradient(145deg, #FFFFFF, #FFF4EE);
    color: #5C3A32;
    padding: 32px;
    border-radius: 20px;
    height: 100%;
    box-shadow: 0 12px 30px rgba(246,183,197,0.28);
    display: flex;
    flex-direction: column;
}

.footer-title {
    font-weight: 800;
    text-transform: uppercase;
    margin-bottom: 25px;
    font-size: 1.3rem;
    letter-spacing: 1.3px;
    color: #7A3E34;
}

.footer-card p,
.footer-card li,
.footer-card td {
    color: #6A4A42;
    font-size: 15px;
    line-height: 1.6;
}

.footer-card-content {
    flex-grow: 1;
}

.footer-icon {
    background: #F6B7C5;
    color: #FFFFFF;
    width: 42px;
    height: 42px;
    line-height: 42px;
    border-radius: 50%;
    text-align: center;
    margin-right: 10px;
    transition: 0.35s ease;
    display: inline-block;
    box-shadow: 0 6px 16px rgba(246,183,197,0.45);
}

.footer-icon:hover {
    background: #E39AAE;
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
    color: #E39AAE;
    width: 22px;
    margin-right: 6px;
}

.footer-hours td {
    border: none;
    padding: 6px 8px;
}

.footer-bottom {
    background: #FFF4EE;
    padding: 18px;
    text-align: center;
    font-size: 14px;
    color: #7A3E34;
    border-top: 1px solid rgba(246,183,197,0.35);
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
