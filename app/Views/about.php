<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Leading Innovation Company</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
        }

        /* Navigation */
        .nav-section {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 15px 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }
        
        .nav-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #2c5aa0;
        }
        
        .nav-links {
            display: flex;
            list-style: none;
            gap: 30px;
        }
        
        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s ease;
            cursor: pointer;
        }
        
        .nav-links a:hover {
            color: #2c5aa0;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="%23ffffff10" points="0,0 1000,300 1000,1000 0,700"/></svg>');
            animation: float 6s ease-in-out infinite;
        }
        
        .hero-content {
            z-index: 2;
            max-width: 800px;
            padding: 0 20px;
        }
        
        .hero-title {
            font-size: 3.5rem;
            margin-bottom: 20px;
            opacity: 0;
            animation: slideInUp 1s ease 0.5s forwards;
        }
        
        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 30px;
            opacity: 0;
            animation: slideInUp 1s ease 0.7s forwards;
        }
        
        .hero-description {
            font-size: 1.1rem;
            margin-bottom: 40px;
            opacity: 0;
            animation: slideInUp 1s ease 0.9s forwards;
        }
        
        .cta-button {
            background: #ff6b6b;
            color: white;
            padding: 15px 40px;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            opacity: 0;
            animation: slideInUp 1s ease 1.1s forwards;
        }
        
        .cta-button:hover {
            background: #ff5252;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
        }

        /* Features Section */
        .features-section {
            padding: 100px 0;
            background: #f8f9fa;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 60px;
            color: #2c5aa0;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            margin-bottom: 80px;
        }
        
        .feature-card {
            background: white;
            padding: 40px 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(30px);
        }
        
        .feature-card.animate {
            opacity: 1;
            transform: translateY(0);
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .feature-icon {
            font-size: 3rem;
            color: #2c5aa0;
            margin-bottom: 20px;
        }
        
        .feature-title {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #333;
        }
        
        .feature-description {
            color: #666;
            line-height: 1.6;
        }

        /* Stats Section */
        .stats-section {
            background: linear-gradient(135deg, #2c5aa0 0%, #5a67d8 100%);
            color: white;
            padding: 80px 0;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            text-align: center;
        }
        
        .stat-item {
            opacity: 0;
            transform: scale(0.8);
            transition: all 0.6s ease;
        }
        
        .stat-item.animate {
            opacity: 1;
            transform: scale(1);
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #ff6b6b;
        }
        
        .stat-label {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        /* Products Section */
        .products-section {
            padding: 100px 0;
            background: white;
        }
        
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 60px;
        }
        
        .product-card {
            background: #f8f9fa;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .product-image {
            height: 200px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: white;
        }
        
        .product-content {
            padding: 25px;
        }
        
        .product-title {
            font-size: 1.3rem;
            margin-bottom: 10px;
            color: #333;
        }
        
        .product-description {
            color: #666;
            font-size: 0.95rem;
        }

        /* Contact Section */
        .contact-section {
            background: #2c5aa0;
            color: white;
            padding: 80px 0;
            text-align: center;
        }
        
        .contact-form {
            max-width: 600px;
            margin: 40px auto 0;
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
        }
        
        .form-group {
            margin-bottom: 25px;
            text-align: left;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: none;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.9);
            color: #333;
            font-size: 1rem;
        }
        
        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }
        
        .submit-btn {
            background: #ff6b6b;
            color: white;
            padding: 15px 40px;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .submit-btn:hover {
            background: #ff5252;
            transform: translateY(-2px);
        }

        /* Animations */
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title { font-size: 2.5rem; }
            .section-title { font-size: 2rem; }
            .nav-links { display: none; }
            .features-grid { grid-template-columns: 1fr; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
        }
        
        /* Scroll to top button */
        .scroll-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: #2c5aa0;
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            cursor: pointer;
            opacity: 0;
            transition: all 0.3s ease;
            z-index: 1000;
        }
        
        .scroll-top.show {
            opacity: 1;
        }
        
        .scroll-top:hover {
            background: #1e3a8a;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <!-- back to previous page -->
    <div class="back-to-prev">
        <a href="javascript:history.back()">← Back</a>
    </div>

    <!-- Features Section -->
    <section id="features" class="features-section">
        <div class="container">
            <h2 class="section-title">About Us</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="feature-title">Durability</h3>
                    <p class="feature-description">
                        Our products are highly durable and resistant to various environmental factors, ensuring long-lasting performance and reliability.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-droplet"></i>
                    </div>
                    <h3 class="feature-title">Moisture Resistance</h3>
                    <p class="feature-description">
                        Designed to withstand high-humidity environments, making them suitable for kitchens, bathrooms, and other challenging conditions.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h3 class="feature-title">Low Maintenance</h3>
                    <p class="feature-description">
                        Our products require minimal maintenance, eliminating the need for regular painting, staining, or extensive upkeep.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3 class="feature-title">Environment Friendly</h3>
                    <p class="feature-description">
                        Made from sustainable materials and eco-friendly processes, contributing to environmental conservation and sustainability.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h3 class="feature-title">Versatility</h3>
                    <p class="feature-description">
                        Available in a wide range of designs, sizes, and finishes, offering flexibility and customization options for various styles.
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-fire"></i>
                    </div>
                    <h3 class="feature-title">Fire Resistant</h3>
                    <p class="feature-description">
                        Our products are fireproof and termite resistant, providing enhanced safety and protection for your property.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number" data-target="500">0</div>
                    <div class="stat-label">Happy Customers</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-target="50">0</div>
                    <div class="stat-label">Products</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-target="8">0</div>
                    <div class="stat-label">Years Experience</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-target="100">0</div>
                    <div class="stat-label">Support Rating</div>
                </div>
            </div>
        </div>
    </section>


    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <h2 class="section-title">Contact Us Now!</h2>
            <p>Ready to get started? Get in touch with us today!</p>
            
            <form class="contact-form" id="contactForm">
                <div class="form-group">
                    <label for="name">Your Name *</label>
                    <input type="text" id="name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Your Email *</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone">
                </div>
                
                <div class="form-group">
                    <label for="message">Your Message *</label>
                    <textarea id="message" name="message" required placeholder="Tell us about your requirements..."></textarea>
                </div>
                
                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane"></i> Send Message
                </button>
            </form>
        </div>
    </section>

    <!-- Scroll to top button -->
    <button class="scroll-top" id="scrollTop" onclick="scrollToTop()">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        // Scroll animations
        function animateOnScroll() {
            const cards = document.querySelectorAll('.feature-card');
            const stats = document.querySelectorAll('.stat-item');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate');
                        
                        // Animate stats counter
                        if (entry.target.classList.contains('stat-item')) {
                            const numberElement = entry.target.querySelector('.stat-number');
                            const target = parseInt(numberElement.getAttribute('data-target'));
                            animateCounter(numberElement, target);
                        }
                    }
                });
            }, { threshold: 0.1 });
            
            cards.forEach(card => observer.observe(card));
            stats.forEach(stat => observer.observe(stat));
        }
        
        // Counter animation
        function animateCounter(element, target) {
            let current = 0;
            const increment = target / 50;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    element.textContent = target + (target === 100 ? '%' : '+');
                    clearInterval(timer);
                } else {
                    element.textContent = Math.ceil(current) + (target === 100 ? '%' : '+');
                }
            }, 40);
        }
        
        // Smooth scrolling
        function scrollToSection(sectionId) {
            const element = document.getElementById(sectionId);
            const offset = 80; // Account for fixed nav
            const elementPosition = element.offsetTop - offset;
            
            window.scrollTo({
                top: elementPosition,
                behavior: 'smooth'
            });
        }
        
        // Scroll to top
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
        
        // Show/hide scroll to top button
        window.addEventListener('scroll', () => {
            const scrollTop = document.getElementById('scrollTop');
            if (window.pageYOffset > 300) {
                scrollTop.classList.add('show');
            } else {
                scrollTop.classList.remove('show');
            }
            
            // Update nav background
            const nav = document.querySelector('.nav-section');
            if (window.pageYOffset > 50) {
                nav.style.background = 'rgba(255, 255, 255, 0.98)';
                nav.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.1)';
            } else {
                nav.style.background = 'rgba(255, 255, 255, 0.95)';
                nav.style.boxShadow = 'none';
            }
        });
        
        // Product modal (simple alert for demo)
        function showProductModal(product) {
            const productInfo = {
                doors: 'Premium Doors: Waterproof, fireproof, 100% termite resistant, strong & durable with low maintenance.',
                frames: 'Door Frames: Perfectly designed to complement our doors with superior durability and easy installation.',
                sheets: 'PVC Sheets: Versatile and reliable sheets for various construction and interior design applications.',
                panels: 'CNC Panels: Precision-crafted panels for beautiful interior, exterior, and partition solutions.'
            };
            
            alert(productInfo[product] || 'Product information will be displayed here.');
        }
        
        // Form submission
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(this);
            const data = Object.fromEntries(formData);
            
            // Simple validation
            if (!data.name || !data.email || !data.message) {
                alert('Please fill in all required fields.');
                return;
            }
            
            // Simulate form submission
            const submitBtn = this.querySelector('.submit-btn');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
            submitBtn.disabled = true;
            
            setTimeout(() => {
                alert('Thank you! Your message has been sent successfully. We will get back to you soon.');
                this.reset();
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 2000);
        });
        
        // Initialize animations
        document.addEventListener('DOMContentLoaded', function() {
            animateOnScroll();
        });
    </script>
</body>
</html>