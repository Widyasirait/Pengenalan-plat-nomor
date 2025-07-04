<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login PINHEL</title>
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
            50% { transform: translateY(-10px) rotate(2deg); }
        }
        
        .slide-in {
            animation: slideIn 0.8s cubic-bezier(0.4, 0.0, 0.2, 1);
        }
        
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-100px); }
            to { opacity: 1; transform: translateX(0); }
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
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(16, 185, 129, 0.4);
        }
        
        .shake-animation {
            animation: shake 0.5s ease-in-out;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        
        .background-pattern {
            background-image: radial-gradient(circle at 25% 25%, rgba(16, 185, 129, 0.1) 0%, transparent 50%),
                              radial-gradient(circle at 75% 75%, rgba(5, 150, 105, 0.1) 0%, transparent 50%);
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-green-50 via-emerald-50 to-green-100 background-pattern flex items-center justify-center p-4">

    <!-- Floating decorative elements -->
    <div class="fixed top-10 left-10 w-20 h-20 bg-green-200 rounded-full opacity-20 floating-animation"></div>
    <div class="fixed bottom-10 right-10 w-16 h-16 bg-emerald-200 rounded-full opacity-30 floating-animation" style="animation-delay: 1s;"></div>
    <div class="fixed top-1/2 right-20 w-12 h-12 bg-green-300 rounded-full opacity-25 floating-animation" style="animation-delay: 2s;"></div>

    <div class="w-full max-w-md">
        <!-- Logo Section -->
        <div class="text-center mb-8 slide-in">
            <div class="inline-block p-4 bg-white rounded-full shadow-lg mb-4 floating-animation">
                <img src="{{ asset('images/Logo.png') }}" alt="Logo PINHEL" class="w-16 h-16 rounded-full">
            </div>
            <h1 class="text-4xl font-bold gradient-text mb-2">PINHEL</h1>
            <p class="text-gray-600">Selamat datang kembali!</p>
        </div>

        <!-- Login Form -->
        <div class="glass-effect rounded-2xl shadow-2xl p-8 slide-in" style="animation-delay: 0.2s;">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
                <i class="fas fa-sign-in-alt mr-2 text-green-500"></i>
                Masuk ke Akun
            </h2>

            {{-- Alert Session --}}
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-lg shadow-sm animate-pulse">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @if($errors->has('loginError'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-lg shadow-sm shake-animation">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        <p>{{ $errors->first('loginError') }}</p>
                    </div>
                </div>
            @endif

            <form action="{{ route('login.submit') }}" method="POST" class="space-y-6">
                @csrf

                <div class="relative group">
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-envelope mr-1"></i>
                        Alamat Email
                    </label>
                    <div class="relative">
                        <input type="email" name="email" id="email" required 
                               placeholder="Masukkan email Anda"
                               value="{{ old('email') }}"
                               class="w-full px-4 py-4 pl-12 border-2 border-gray-200 rounded-xl input-focus-effect focus:outline-none focus:border-green-400 text-gray-700 @error('email') border-red-400 @enderror">
                        <i class="fas fa-envelope absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 group-focus-within:text-green-500 transition-colors"></i>
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
                               placeholder="Masukkan kata sandi"
                               class="w-full px-4 py-4 pl-12 pr-12 border-2 border-gray-200 rounded-xl input-focus-effect focus:outline-none focus:border-green-400 text-gray-700 @error('password') border-red-400 @enderror">
                        <i class="fas fa-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 group-focus-within:text-green-500 transition-colors"></i>
                        <button type="button" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-green-500 transition-colors password-toggle">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-2 flex items-center">
                            <i class="fas fa-exclamation-triangle mr-1"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center text-sm text-gray-700 cursor-pointer hover:text-green-600 transition-colors">
                        <input type="checkbox" name="remember" class="h-4 w-4 text-green-500 border-gray-300 rounded mr-3 focus:ring-green-400" {{ old('remember') ? 'checked' : '' }}>
                        <i class="fas fa-heart mr-1 text-red-400"></i>
                        Ingat saya
                    </label>
                    <a href="#" class="text-sm text-green-600 hover:text-green-700 hover:underline transition-colors">
                        <i class="fas fa-key mr-1"></i>
                        Lupa kata sandi?
                    </a>
                </div>

                <button type="submit" class="w-full py-4 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-bold rounded-xl btn-hover-effect relative overflow-hidden">
                    <span class="flex items-center justify-center">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        MASUK SEKARANG
                    </span>
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-gray-200">
                <p class="text-center text-gray-600">
                    Belum memiliki akun? 
                    <a href="{{ route('register') }}" class="text-green-600 font-bold hover:text-green-700 hover:underline transition-colors ml-1">
                        <i class="fas fa-user-plus mr-1"></i>
                        Daftar Sekarang
                    </a>
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-6 text-gray-500 text-sm">
            <p>&copy; 2024 PINHEL. Semua hak dilindungi.</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleBtn = document.querySelector('.password-toggle');
            const passInput = document.querySelector('#password');

            if (toggleBtn && passInput) {
                toggleBtn.addEventListener('click', () => {
                    const type = passInput.type === 'password' ? 'text' : 'password';
                    passInput.type = type;

                    const icon = toggleBtn.querySelector('i');
                    icon.classList.toggle('fa-eye');
                    icon.classList.toggle('fa-eye-slash');
                    
                    // Add animation effect
                    toggleBtn.style.transform = 'scale(1.1)';
                    setTimeout(() => {
                        toggleBtn.style.transform = 'scale(1)';
                    }, 150);
                });
            }

            // Auto hide alerts after 5 seconds with fade effect
            const alerts = document.querySelectorAll('.bg-green-100, .bg-red-100');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.transition = 'all 0.5s ease';
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateY(-20px)';
                    setTimeout(() => {
                        alert.remove();
                    }, 500);
                }, 5000);
            });

            // Add interactive effects to inputs
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('focus', () => {
                    input.parentElement.style.transform = 'translateY(-2px)';
                });
                
                input.addEventListener('blur', () => {
                    input.parentElement.style.transform = 'translateY(0)';
                });
            });

            // Form submission with loading effect
            const form = document.querySelector('form');
            const submitButton = document.querySelector('button[type="submit"]');
            
            form.addEventListener('submit', () => {
                submitButton.innerHTML = `
                    <span class="flex items-center justify-center">
                        <i class="fas fa-spinner fa-spin mr-2"></i>
                        MEMPROSES...
                    </span>
                `;
                submitButton.disabled = true;
            });
        });
    </script>
</body>
</html>