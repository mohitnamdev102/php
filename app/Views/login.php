<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    /* Global Styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f0f2f5;
      overflow-x: hidden;
    }

    /* Split Layout */
    .split-left {
      background: linear-gradient(135deg, rgba(59, 89, 152, 0.8) 0%, rgba(45, 67, 115, 0.9) 100%), 
                  url('https://artfasad.com/wp-content/uploads/2024/07/wooden-door-design-for-home-13.jpg') center center no-repeat;
      background-size: cover;
      background-attachment: fixed;
      min-height: 100vh;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .split-left::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(45deg, rgba(59, 89, 152, 0.1) 0%, rgba(45, 67, 115, 0.2) 100%);
      animation: gradientShift 8s ease-in-out infinite;
    }

    .split-left-content {
      position: relative;
      z-index: 2;
      text-align: center;
      color: white;
      padding: 2rem;
    }

    .split-left h1 {
      /* horizontal and vertical center */
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      font-size: 3rem;
      font-weight: 700;
      margin: 0;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
      animation: fadeInUp 1s ease-out;
    }

    .split-left p {
      font-size: 1.2rem;
      opacity: 0.9;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
      animation: fadeInUp 1s ease-out 0.3s both;
    }

    .split-right {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      background: linear-gradient(135deg, #f4f6fb 0%, #e8ecf4 100%);
      position: relative;
    }

    .split-right::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-image: 
        radial-gradient(circle at 20% 80%, rgba(59, 89, 152, 0.05) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(45, 67, 115, 0.05) 0%, transparent 50%);
      animation: backgroundFloat 10s ease-in-out infinite;
    }

    /* Login Container */
    .login-container {
      width: 100%;
      max-width: 420px;
      padding: 3rem 2.5rem;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border-radius: 24px;
      box-shadow: 
        0 8px 32px rgba(0, 0, 0, 0.1),
        0 2px 8px rgba(0, 0, 0, 0.05);
      text-align: center;
      position: relative;
      z-index: 2;
      animation: slideInUp 0.8s ease-out;
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .login-container::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      border-radius: 24px;
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
      z-index: -1;
    }

    /* Logo Styling */
    .logo-container {
      margin-bottom: 2rem;
      position: relative;
    }

    .logo-container img {
      transition: transform 0.3s ease;
      filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1));
    }

    .logo-container:hover img {
      transform: scale(1.05);
    }

    /* Typography */
    .login-container h1 {
      font-size: 2rem;
      font-weight: 700;
      color: #2d3a4b;
      margin-bottom: 0.5rem;
      background: linear-gradient(135deg, #2d3a4b 0%, #3b5998 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .login-container h2 {
      font-size: 1.1rem;
      color: #6c757d;
      font-weight: 400;
      margin-bottom: 2rem;
    }

    /* Form Styling */
    .form-label {
      font-weight: 600;
      color: #3b5998;
      margin-bottom: 0.75rem;
      text-align: left;
      display: block;
    }

    .input-group {
      margin-bottom: 1.5rem;
      position: relative;
    }

    .input-group-text {
      background: linear-gradient(135deg, #f4f6fb 0%, #e8ecf4 100%);
      border: 2px solid #e3e7ed;
      border-right: none;
      color: #3b5998;
      font-size: 1.1rem;
      border-radius: 12px 0 0 12px;
      transition: all 0.3s ease;
    }

    .form-control {
      border: 2px solid #e3e7ed;
      border-left: none;
      border-radius: 0 12px 12px 0;
      padding: 0.875rem 1rem;
      font-size: 1rem;
      transition: all 0.3s ease;
      background: rgba(255, 255, 255, 0.8);
    }

    .form-control:focus {
      border-color: #3b5998;
      box-shadow: 0 0 0 0.2rem rgba(59, 89, 152, 0.15);
      background: rgba(255, 255, 255, 1);
    }

    .input-group:focus-within .input-group-text {
      border-color: #3b5998;
      background: linear-gradient(135deg, rgba(59, 89, 152, 0.1) 0%, rgba(59, 89, 152, 0.05) 100%);
    }

    /* Button Styling */
    .btn-primary {
      background: linear-gradient(135deg, #3b5998 0%, #2d4373 100%);
      border: none;
      border-radius: 12px;
      font-weight: 600;
      letter-spacing: 0.5px;
      padding: 0.875rem 2rem;
      font-size: 1rem;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .btn-primary::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s ease;
    }

    .btn-primary:hover::before {
      left: 100%;
    }

    .btn-primary:hover, .btn-primary:focus {
      background: linear-gradient(135deg, #2d4373 0%, #1e2a5c 100%);
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(59, 89, 152, 0.3);
    }

    .btn-primary:active {
      transform: translateY(0);
    }

    /* Links */
    .forgot-password {
      font-size: 0.95rem;
      color: #3b5998;
      text-decoration: none;
      transition: all 0.3s ease;
      position: relative;
    }

    .forgot-password::after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 0;
      height: 2px;
      background: linear-gradient(135deg, #3b5998 0%, #2d4373 100%);
      transition: width 0.3s ease;
    }

    .forgot-password:hover {
      color: #2d4373;
    }

    .forgot-password:hover::after {
      width: 100%;
    }

    /* Toggle Password Icon */
    #togglePassword {
      cursor: pointer;
      transition: all 0.3s ease;
    }

    #togglePassword:hover {
      background: linear-gradient(135deg, rgba(59, 89, 152, 0.15) 0%, rgba(59, 89, 152, 0.1) 100%);
      transform: scale(1.1);
    }

    /* Animations */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes slideInUp {
      from {
        opacity: 0;
        transform: translateY(50px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes gradientShift {
      0%, 100% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
    }

    @keyframes backgroundFloat {
      0%, 100% {
        transform: translateY(0px);
      }
      50% {
        transform: translateY(-10px);
      }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .split-left {
        display: none;
      }
      
      .split-right {
        padding: 1rem;
      }
      
      .login-container {
        padding: 2rem 1.5rem;
        margin: 1rem;
      }
      
      .split-left h1 {
        font-size: 2rem;
      }
      
      .login-container h1 {
        font-size: 1.5rem;
      }
    }

    @media (max-width: 480px) {
      .login-container {
        padding: 1.5rem 1rem;
        border-radius: 16px;
      }
      
      .btn-primary {
        padding: 0.75rem 1.5rem;
      }
    }

    /* Loading Animation */
    .loading {
      opacity: 0.7;
      pointer-events: none;
    }

    .loading .btn-primary {
      background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
    }

    /* Focus Indicators for Accessibility */
    .form-control:focus,
    .btn-primary:focus,
    .forgot-password:focus {
      outline: 2px solid #3b5998;
      outline-offset: 2px;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 split-left d-none d-md-block">
        <div class="split-left-content">
          <h1>Welcome to Maica</h1>
        </div>
      </div>
      <div class="col-md-6 split-right">
        <div class="login-container">
          <div class="logo-container">
            <img src="https://maicagroup.com/wp-content/uploads/2024/11/logo1-150x47.webp" alt="Maica Logo" width="150" height="47">
          </div>
          <h1>Welcome Back</h1>
          <h2>Sign in to your admin account</h2>
          <form action="<?= base_url('login') ?>" method="post" id="loginForm">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <div class="input-group">
                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                <span class="input-group-text" id="togglePassword">
                    <i class="fa-solid fa-lock"></i>
                </span>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>
            </div>
            <a href="#" class="forgot-password d-block mb-3">Forgot password?</a>
            <button type="submit" class="btn btn-primary w-100">
              <i class="fas fa-sign-in-alt me-2"></i>SIGN IN
            </button>
            </form>

        </div>
      </div>
    </div>
  </div>
  <script>
    // Enhanced password show/hide toggle
    document.getElementById('togglePassword').addEventListener('click', function() {
      const pwd = document.getElementById('password');
      const icon = this.firstElementChild;
      
      if (pwd.type === 'password') {
        pwd.type = 'text';
        icon.classList.remove('fa-lock');
        icon.classList.add('fa-unlock');
        this.setAttribute('title', 'Hide password');
      } else {
        pwd.type = 'password';
        icon.classList.remove('fa-unlock');
        icon.classList.add('fa-lock');
        this.setAttribute('title', 'Show password');
      }
    });

    // Form submission with loading state
    document.getElementById('loginForm').addEventListener('submit', function(e) {
      const submitBtn = this.querySelector('button[type="submit"]');
      const originalText = submitBtn.innerHTML;
      
      // Add loading state
      submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Signing In...';
      submitBtn.disabled = true;
      this.classList.add('loading');
      
      // If form validation fails, restore button state
      setTimeout(() => {
        const requiredFields = this.querySelectorAll('[required]');
        let hasErrors = false;
        
        requiredFields.forEach(field => {
          if (!field.value.trim()) {
            hasErrors = true;
            field.classList.add('is-invalid');
          } else {
            field.classList.remove('is-invalid');
          }
        });
        
        if (hasErrors) {
          e.preventDefault();
          submitBtn.innerHTML = originalText;
          submitBtn.disabled = false;
          this.classList.remove('loading');
        }
      }, 100);
    });

    // Enhanced form interactions
    document.addEventListener('DOMContentLoaded', function() {
      // Add floating label effect
      const inputs = document.querySelectorAll('.form-control');
      
      inputs.forEach(input => {
        // Focus effects
        input.addEventListener('focus', function() {
          this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
          this.parentElement.classList.remove('focused');
          
          // Validation feedback
          if (this.hasAttribute('required') && !this.value.trim()) {
            this.classList.add('is-invalid');
          } else {
            this.classList.remove('is-invalid');
          }
        });
        
        // Real-time validation
        input.addEventListener('input', function() {
          if (this.classList.contains('is-invalid') && this.value.trim()) {
            this.classList.remove('is-invalid');
          }
        });
      });
      
      // Add ripple effect to button
      const button = document.querySelector('.btn-primary');
      button.addEventListener('click', function(e) {
        const ripple = document.createElement('span');
        const rect = this.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;
        
        ripple.style.width = ripple.style.height = size + 'px';
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
        ripple.classList.add('ripple');
        
        this.appendChild(ripple);
        
        setTimeout(() => {
          ripple.remove();
        }, 600);
      });
      
      // Keyboard navigation enhancement
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
          const activeElement = document.activeElement;
          if (activeElement.tagName === 'INPUT') {
            const form = activeElement.closest('form');
            const inputs = form.querySelectorAll('input');
            const currentIndex = Array.from(inputs).indexOf(activeElement);
            
            if (currentIndex < inputs.length - 1) {
              inputs[currentIndex + 1].focus();
              e.preventDefault();
            }
          }
        }
      });
      
      // Add initial tooltips
      document.getElementById('togglePassword').setAttribute('title', 'Show password');
    });

    // Additional CSS for enhanced interactions
    const additionalStyles = `
      <style>
        .form-control.is-invalid {
          border-color: #dc3545;
          animation: shake 0.3s ease-in-out;
        }
        
        .input-group.focused .input-group-text {
          transform: scale(1.05);
        }
        
        .ripple {
          position: absolute;
          border-radius: 50%;
          background: rgba(255, 255, 255, 0.3);
          transform: scale(0);
          animation: rippleEffect 0.6s linear;
          pointer-events: none;
        }
        
        @keyframes rippleEffect {
          to {
            transform: scale(2);
            opacity: 0;
          }
        }
        
        @keyframes shake {
          0%, 100% { transform: translateX(0); }
          10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
          20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
        
        .login-container:hover {
          transform: translateY(-2px);
          box-shadow: 
            0 12px 40px rgba(0, 0, 0, 0.15),
            0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .form-control:valid {
          border-color: #28a745;
        }
        
        .input-group:focus-within {
          transform: scale(1.02);
        }
      </style>
    `;
    
    document.head.insertAdjacentHTML('beforeend', additionalStyles);
  </script>
</body>
</html>