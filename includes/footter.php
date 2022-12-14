    <footer>
        <div class="main-content">
            <div class="left box">
                <h2>About us</h2>
                <div class="content">
                    <p>TDW Seller Onine គឺជា​ Platform មួយសម្រាប់លក់ផលិតផល សេវាកម្មរបស់ដៃគូរសហការណ៍</p>
                    <div class="social">
                        <?php include('includes/link-socail.php') ?>
                        <a href="<?php echo $facebook ?>"><span class="fab fa-facebook-f"></span></a>
                        <a href="<?php echo $twitter ?>"><span class="fab fa-twitter"></span></a>
                        <a href="<?php echo $instagram ?>"><span class="fab fa-instagram"></span></a>
                        <a href="<?php echo $youtube ?>"><span class="fab fa-youtube"></span></a>

                        <?php ?>

                    </div>
                </div>
            </div>

            <div class="center box">
                <h2>Address</h2>
                <div class="content">
                    <div class="place">
                        <span class="fas fa-map-marker-alt"></span>
                        <span class="text">Phnom Penh, Cambodia</span>
                    </div>
                    <div class="phone">
                        <span class="fas fa-phone-alt"></span>
                        <span class="text">+855-10-554-161</span>
                    </div>
                    <div class="email">
                        <span class="fas fa-envelope"></span>
                        <span class="text">Tdwso.info@gmail.com</span>
                    </div>
                </div>
            </div>

            <div class="right box">
                <h2>Contact us</h2>
                <div class="content">
                    <form action="<?php echo $formmail ?>" method="POST" autocomplete="off">
                        <input type="hidden" name="_subject" value="មានអ្នកផ្ញើរសារមកកាន់អ្នក!">
                        <input type="hidden" name="_template" value="table">
                        <input type="hidden" name="_captcha" value="false">
                        <div class="email">
                            <div class="text">Email *</div>
                            <input type="email" name="Email" required>
                        </div>
                        <div class="msg">
                            <div class="text">Message *</div>
                            <textarea name="Message" rows="2" cols="25" required></textarea>
                        </div>
                        <input type="hidden" name="_next" value="https://www.tdwso.store">
                        <div class="btn">
                            <button type="submit">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="bottom">
            <center>
                <span class="credit"><a href="<?php echo $facebook ?>">TDW Seller Online</a> | </span>
                <span class="far fa-copyright"></span><span> 2022 All rights reserved.</span>
            </center>
        </div>
    </footer>