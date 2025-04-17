<footer class="bottomMenu">
        <div class="innerwapperbox">
            <div class="bottomMenu_inner">
                <div class="menubx">
                    <a href="{{ route('home') }}">
                        <p><i class="bi bi-house"></i></p>
                        <div>Home</div>
                    </a>
                </div>
                <div class="menubx">
                    <a href="{{ route('discover') }}">
                        <p><i class="bi bi-compass"></i></p>
                        <div>Discover</div>
                    </a>
                </div>
                <div class="menubx" style="position: relative; display: inline-block;">
                    <a href="{{ route('cart') }}" style="display: block; position: relative;">
                        <i class="bi bi-cart" style="font-size: 24px;"></i>
                        <span class="cart-count" style="
                            position: absolute;
                            top: -5px;   /* adjust as per your design */
                            right: -5px; /* adjust as per your design */
                            background: red;
                            color: #fff;
                            border-radius: 50%;
                            padding: 2px 6px;
                            font-size: 12px;
                        ">{{ count(session('cart', [])) }}</span>
                        <div>Cart</div>
                    </a>
                </div>

                <div class="menubx">
                    <a href="{{ route('profile') }}">
                        <p><i class="bi bi-person"></i></p>
                        <div>Profile</div>
                    </a>
                </div>
                
            </div>
        </div>
    </footer>



    