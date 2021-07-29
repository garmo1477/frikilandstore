<!-- footer section -->
<div class="social-icons bg-color d-flex align-items-center justify-content-center">    
   <a href="#"><i class="fab fa-facebook"></i></a> 
   <a href="#"><i class="fab fa-instagram"></i></a> 
   <a href="#"><i class="fab fa-twitter"></i></a> 
</div>
<footer class="footer-section spad pb-0 col-md-12">
    <div class="footer-top">
        <div class="footer-warp">
            <div class="row pt-4">
                <div class="widget-item col-md-3">
                    <img src="../images/logo.png" alt="">
                </div>
                <div class="widget-item col-md-3">
                    <h4>{{ __(('Info de contacto')) }}</h4>
                    <ul class="contact-list">                        
                        <li>pagarcmore@outlook.com</li>
                    </ul>
                </div>
                <div class="widget-item col-md-3">
                    <h4>{{ __('Productos') }}</h4>
                    <ul>
                        <li><a href="">{{ __('Videojuegos') }}</a></li>
                        <li><a href="">{{ __('Merchandising') }}</a></li>                        
                    </ul>
                </div>                
                <div class="widget-item col-md-3">
                    <h4>{{ __('Boletín de notícias') }}</h4>
                    <form class="footer-newslatter">
                        <input type="email" placeholder="E-mail">
                        <button class="btn btn-danger">{{ __('Suscríbete') }}</button>
                        <p>*We don’t spam</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="footer-warp">
            <ul class="footer-menu">
                <li><a href="#">{{ __('Política de privacidad') }}</a></li>
                <li><a href="#">{{ __('Registrarse') }}</a></li>                
            </ul>
            <div class="copyright">
                {{ __('© Copyright 2021 Frikiland Store') }}
            </div>
        </div>
    </div>
</footer>
<!-- footer section end -->