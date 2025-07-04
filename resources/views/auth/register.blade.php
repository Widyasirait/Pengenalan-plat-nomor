<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar - PINHEL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .floating-animation {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(3deg); }
        }
        
        .slide-up {
            animation: slideUp 0.8s cubic-bezier(0.4, 0.0, 0.2, 1);
        }
        
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #10b981, #059669);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .input-focus-effect {
            transition: all 0.3s ease;
        }
        
        .input-focus-effect:focus {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(16, 185, 129, 0.1), 0 10px 10px -5px rgba(16, 185, 129, 0.04);
        }
        
        .btn-hover-effect {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-hover-effect::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }
        
        .btn-hover-effect:hover::before {
            left: 100%;
        }
        
        .btn-hover-effect:hover {
            transform: translateY(-3px);
            box-shadow: 0 25px 35px -5px rgba(16, 185, 129, 0.4);
        }
        
        .progress-bar {
            height: 4px;
            background: #e5e7eb;
            border-radius: 2px;
            overflow: hidden;
        }
        
        .progress-fill {
            height: 100%;
            transition: width 0.3s ease;
            border-radius: 2px;
        }
        
        .strength-weak { background: #ef4444; }
        .strength-medium { background: #f59e0b; }
        .strength-strong { background: #10b981; }
        
        .shake-animation {
            animation: shake 0.5s ease-in-out;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        
        .background-pattern {
            background-image: radial-gradient(circle at 20% 20%, rgba(16, 185, 129, 0.1) 0%, transparent 50%),
                              radial-gradient(circle at 80% 80%, rgba(5, 150, 105, 0.1) 0%, transparent 50%),
                              radial-gradient(circle at 50% 50%, rgba(34, 197, 94, 0.05) 0%, transparent 50%);
        }
        
        .pulse-effect {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .spinner {
            border: 2px solid #f3f3f3;
            border-top: 2px solid #10b981;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-green-50 via-emerald-50 to-green-100 background-pattern flex items-center justify-center p-4">

    <!-- Floating decorative elements -->
    <div class="fixed top-20 left-16 w-24 h-24 bg-green-200 rounded-full opacity-20 floating-animation"></div>
    <div class="fixed bottom-16 right-20 w-20 h-20 bg-emerald-200 rounded-full opacity-25 floating-animation" style="animation-delay: 1.5s;"></div>
    <div class="fixed top-1/3 right-10 w-16 h-16 bg-green-300 rounded-full opacity-30 floating-animation" style="animation-delay: 3s;"></div>
    <div class="fixed bottom-1/3 left-10 w-12 h-12 bg-emerald-300 rounded-full opacity-20 floating-animation" style="animation-delay: 4s;"></div>

    <div class="w-full max-w-lg">
        <!-- Logo Section -->
        <div class="text-center mb-8 slide-up">
            <div class="inline-block p-4 bg-white rounded-full shadow-xl mb-4 pulse-effect">
                <img src="{{ asset('images/Logo.png') }}" alt="Logo PINHEL" class="w-20 h-20 rounded-full">
            </div>
            <h1 class="text-4xl font-bold gradient-text mb-2">PINHEL</h1>
            <p class="text-gray-600">Bergabunglah dengan komunitas kami!</p>
        </div>

        <!-- Register Form -->
        <div class="glass-effect rounded-3xl shadow-2xl p-8 slide-up" style="animation-delay: 0.3s;">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-2">
                <i class="fas fa-user-plus mr-2 text-green-500"></i>
                Daftar Akun Baru
            </h2>
            <p class="text-center text-gray-600 mb-8">Mulai perjalanan Anda bersama PINHEL</p>

            <!-- Alert Errors -->
            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-sm mb-6 shake-animation">
                    <div class="flex items-start">
                        <i class="fas fa-exclamation-circle mr-2 mt-1"></i>
                        <div>
                            <p class="font-bold mb-1">Terjadi kesalahan:</p>
                            <ul class="list-disc ml-5 text-sm space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Success Alert -->
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-sm mb-6 animate-pulse">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-6" id="registerForm">
                @csrf
                
                <div class="relative group">
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-user mr-1"></i>
                        Nama Lengkap
                    </label>
                    <div class="relative">
                        <input type="text" name="name" id="name" required
                            placeholder="Masukkan nama lengkap"
                            value="{{ old('name') }}"
                            class="w-full px-4 py-4 pl-12 border-2 border-gray-200 rounded-xl input-focus-effect focus:outline-none focus:border-green-400 @error('name') border-red-400 @enderror">
                        <i class="fas fa-user absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 group-focus-within:text-green-500 transition-colors"></i>
                    </div>
                    @error('name')
                        <p class="text-red-500 text-xs mt-2 flex items-center">
                            <i class="fas fa-exclamation-triangle mr-1"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="relative group">
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-envelope mr-1"></i>
                        Alamat Email
                    </label>
                    <div class="relative">
                        <input type="email" name="email" id="email" required
                            placeholder="contoh@email.com"
                            value="{{ old('email') }}"
                            class="w-full px-4 py-4 pl-12 border-2 border-gray-200 rounded-xl input-focus-effect focus:outline-none focus:border-green-400 @error('email') border-red-400 @enderror">
                        <i class="fas fa-envelope absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 group-focus-within:text-green-500 transition-colors"></i>
                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2" id="emailValidation">
                            <!-- Email validation icon will appear here -->
                        </div>
                    </div>
                    @error('email')
                        <p class="text-red-500 text-xs mt-2 flex items-center">
                            <i class="fas fa-exclamation-triangle mr-1"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="relative group">
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-lock mr-1"></i>
                        Kata Sandi
                    </label>
                    <div class="relative">
                        <input type="password" name="password" id="password" required
                            placeholder="Minimal 8 karakter"
                            class="w-full px-4 py-4 pl-12 pr-12 border-2 border-gray-200 rounded-xl input-focus-effect focus:outline-none focus:border-green-400 @error('password') border-red-400 @enderror">
                        <i class="fas fa-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 group-focus-within:text-green-500 transition-colors"></i>
                        <button type="button" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-green-500 transition-colors" onclick="togglePassword('password', this)">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    
                    <!-- Password Strength Indicator -->
                    <div class="mt-3 hidden" id="passwordStrength">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-xs font-medium text-gray-600">Kekuatan Password:</span>
                            <span class="text-xs font-bold" id="strengthText">Lemah</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" id="strengthBar" style="width: 0%;"></div>
                        </div>
                        <div class="mt-2 text-xs text-gray-500" id="passwordRequirements">
                            <div class="grid grid-cols-2 gap-1">
                                <div class="flex items-center" id="req-length">
                                    <i class="fas fa-times text-red-400 mr-1"></i>
                                    <span>Min 8 karakter</span>
                                </div>
                                <div class="flex items-center" id="req-number">
                                    <i class="fas fa-times text-red-400 mr-1"></i>
                                    <span>Mengandung angka</span>
                                </div>
                                <div class="flex items-center" id="req-lower">
                                    <i class="fas fa-times text-red-400 mr-1"></i>
                                    <span>Huruf kecil</span>
                                </div>
                                <div class="flex items-center" id="req-upper">
                                    <i class="fas fa-times text-red-400 mr-1"></i>
                                    <span>Huruf besar</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @error('password')
                        <p class="text-red-500 text-xs mt-2 flex items-center">
                            <i class="fas fa-exclamation-triangle mr-1"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="relative group">
                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-lock mr-1"></i>
                        Konfirmasi Kata Sandi
                    </label>
                    <div class="relative">
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                            placeholder="Ulangi kata sandi"
                            class="w-full px-4 py-4 pl-12 pr-12 border-2 border-gray-200 rounded-xl input-focus-effect focus:outline-none focus:border-green-400">
                        <i class="fas fa-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 group-focus-within:text-green-500 transition-colors"></i>
                        <button type="button" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-green-500 transition-colors" onclick="togglePassword('password_confirmation', this)">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div id="password-match" class="text-xs mt-2 hidden">
                        <span id="password-match-text" class="flex items-center"></span>
                    </div>
                </div>

                <div class="flex items-start mt-6">
                    <input type="checkbox" name="terms" id="terms" required 
                           class="h-5 w-5 text-green-500 border-gray-300 rounded mr-3 mt-1 focus:ring-green-400">
                    <label for="terms" class="text-sm text-gray-700 leading-relaxed">
                        Saya menyetujui <a href="#" class="text-green-600 hover:text-green-700 font-semibold hover:underline transition-colors">Syarat & Ketentuan</a> 
                        dan <a href="#" class="text-green-600 hover:text-green-700 font-semibold hover:underline transition-colors">Kebijakan Privasi</a> PINHEL
                    </label>
                </div>

                <button type="submit" id="submitButton"
                    class="w-full py-4 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-bold rounded-xl btn-hover-effect relative overflow-hidden disabled:opacity-50 disabled:cursor-not-allowed">
                    <span class="flex items-center justify-center" id="buttonContent">
                        <i class="fas fa-user-plus mr-2"></i>
                        Daftar Sekarang
                    </span>
                    <div class="hidden items-center justify-center" id="loadingContent">
                        <div class="spinner mr-2"></div>
                        Mendaftar...
                    </div>
                </button>
            </form>

            <!-- Login Link -->
            <div class="text-center mt-8 pt-6 border-t border-gray-200">
                <p class="text-gray-600 mb-4">Sudah punya akun?</p>
                <a href="{{ route('login') }}" class="inline-flex items-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl transition-all duration-300 hover:shadow-lg transform hover:-translate-y-1">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Masuk di sini
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-8 slide-up" style="animation-delay: 0.6s;">
            <p class="text-gray-500 text-sm">
                © 2024 PINHEL. Semua hak dilindungi undang-undang.
            </p>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword(inputId, button) {
            const input = document.getElementById(inputId);
            const icon = button.querySelector('i');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';  
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        // Password strength checker
        const passwordInput = document.getElementById('password');
        const passwordStrengthDiv = document.getElementById('passwordStrength');
        const strengthBar = document.getElementById('strengthBar');
        const strengthText = document.getElementById('strengthText');

        passwordInput.addEventListener('input', function() {
            const password = this.value;
            
            if (password.length > 0) {
                passwordStrengthDiv.classList.remove('hidden');
                checkPasswordStrength(password);
                updateRequirements(password);
            } else {
                passwordStrengthDiv.classList.add('hidden');
            }
        });

        function checkPasswordStrength(password) {
            let strength = 0;
            let strengthClass = '';
            let strengthLabel = '';

            // Length check
            if (password.length >= 8) strength += 25;
            
            // Number check
            if (/\d/.test(password)) strength += 25;
            
            // Lowercase check
            if (/[a-z]/.test(password)) strength += 25;
            
            // Uppercase check
            if (/[A-Z]/.test(password)) strength += 25;

            // Determine strength level
            if (strength <= 25) {
                strengthClass = 'strength-weak';
                strengthLabel = 'Lemah';
            } else if (strength <= 75) {
                strengthClass = 'strength-medium';
                strengthLabel = 'Sedang';
            } else {
                strengthClass = 'strength-strong';
                strengthLabel = 'Kuat';
            }

            // Update UI
            strengthBar.style.width = strength + '%';
            strengthBar.className = 'progress-fill ' + strengthClass;
            strengthText.textContent = strengthLabel;
            strengthText.className = 'text-xs font-bold ' + 
                (strengthClass === 'strength-weak' ? 'text-red-500' : 
                 strengthClass === 'strength-medium' ? 'text-yellow-500' : 'text-green-500');
        }

        function updateRequirements(password) {
            const requirements = [
                { id: 'req-length', test: password.length >= 8 },
                { id: 'req-number', test: /\d/.test(password) },
                { id: 'req-lower', test: /[a-z]/.test(password) },
                { id: 'req-upper', test: /[A-Z]/.test(password) }
            ];

            requirements.forEach(req => {
                const element = document.getElementById(req.id);
                const icon = element.querySelector('i');
                
                if (req.test) {
                    icon.className = 'fas fa-check text-green-500 mr-1';
                    element.classList.add('text-green-600');
                    element.classList.remove('text-gray-500');
                } else {
                    icon.className = 'fas fa-times text-red-400 mr-1';
                    element.classList.add('text-gray-500');
                    element.classList.remove('text-green-600');
                }
            });
        }

        // Password confirmation checker
        const passwordConfirmInput = document.getElementById('password_confirmation');
        const passwordMatch = document.getElementById('password-match');
        const passwordMatchText = document.getElementById('password-match-text');

        function checkPasswordMatch() {
            const password = passwordInput.value;
            const confirmPassword = passwordConfirmInput.value;

            if (confirmPassword.length > 0) {
                passwordMatch.classList.remove('hidden');
                
                if (password === confirmPassword) {
                    passwordMatchText.innerHTML = '<i class="fas fa-check text-green-500 mr-1"></i><span class="text-green-600">Password cocok</span>';
                    passwordConfirmInput.classList.remove('border-red-400');
                    passwordConfirmInput.classList.add('border-green-400');
                } else {
                    passwordMatchText.innerHTML = '<i class="fas fa-times text-red-500 mr-1"></i><span class="text-red-600">Password tidak cocok</span>';
                    passwordConfirmInput.classList.remove('border-green-400');
                    passwordConfirmInput.classList.add('border-red-400');
                }
            } else {
                passwordMatch.classList.add('hidden');
                passwordConfirmInput.classList.remove('border-red-400', 'border-green-400');
            }
        }

        passwordInput.addEventListener('input', checkPasswordMatch);
        passwordConfirmInput.addEventListener('input', checkPasswordMatch);

        // Email validation
        const emailInput = document.getElementById('email');
        const emailValidation = document.getElementById('emailValidation');

        emailInput.addEventListener('input', function() {
            const email = this.value;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            if (email.length > 0) {
                if (emailRegex.test(email)) {
                    emailValidation.innerHTML = '<i class="fas fa-check text-green-500"></i>';
                    this.classList.remove('border-red-400');
                    this.classList.add('border-green-400');
                } else {
                    emailValidation.innerHTML = '<i class="fas fa-times text-red-500"></i>';
                    this.classList.remove('border-green-400');
                    this.classList.add('border-red-400');
                }
            } else {
                emailValidation.innerHTML = '';
                this.classList.remove('border-red-400', 'border-green-400');
            }
        });

        // Form submission - Remove preventDefault to allow normal Laravel form submission
        const form = document.getElementById('registerForm');
        const submitButton = document.getElementById('submitButton');
        const buttonContent = document.getElementById('buttonContent');
        const loadingContent = document.getElementById('loadingContent');

        form.addEventListener('submit', function(e) {
            // Show loading state
            submitButton.disabled = true;
            buttonContent.classList.add('hidden');
            loadingContent.classList.remove('hidden');
            loadingContent.classList.add('flex');
            
            // Allow form to submit normally to Laravel backend
        });

        function showSuccessMessage(message) {
            const successAlert = document.getElementById('successAlert');
            const successMessage = document.getElementById('successMessage');
            
            successMessage.textContent = message;
            successAlert.classList.remove('hidden');
            
            setTimeout(() => {
                successAlert.classList.add('hidden');
            }, 5000);
        }

        function showErrorMessage(errors) {
            const errorAlert = document.getElementById('errorAlert');
            const errorList = document.getElementById('errorList');
            
            errorList.innerHTML = '';
            errors.forEach(error => {
                const li = document.createElement('li');
                li.textContent = error;
                errorList.appendChild(li);
            });
            
            errorAlert.classList.remove('hidden');
            
            setTimeout(() => {
                errorAlert.classList.add('hidden');
            }, 5000);
        }

        // Animate elements on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('slide-up');
                }
            });
        }, observerOptions);

        // Observe all form groups
        document.querySelectorAll('.relative.group').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>