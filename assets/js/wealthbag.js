// WealthBag - Custom JavaScript
// Futuristic interactions and animations

document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for navigation links
    const navLinks = document.querySelectorAll('a[href^="#"]');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetSection = document.querySelector(targetId);
            
            if (targetSection) {
                targetSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Parallax effect for hero section
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.crypto-coin');
        
        parallaxElements.forEach(element => {
            const speed = 0.5;
            element.style.transform = `translateY(${scrolled * speed}px) rotate(${scrolled * 0.1}deg)`;
        });
    });

    // Animated counter for statistics
    function animateCounter(element, target, duration) {
        let start = 0;
        const increment = target / (duration / 16);
        
        function updateCounter() {
            start += increment;
            if (start < target) {
                element.textContent = Math.floor(start);
                requestAnimationFrame(updateCounter);
            } else {
                element.textContent = target;
            }
        }
        
        updateCounter();
    }

    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                
                // Animate statistics when hero section is visible
                if (entry.target.classList.contains('hero-section')) {
                    const stats = entry.target.querySelectorAll('.stat-value');
                    stats.forEach((stat, index) => {
                        setTimeout(() => {
                            const text = stat.textContent;
                            if (text.includes('$')) {
                                const value = parseFloat(text.replace(/[$M]/g, ''));
                                if (text.includes('M')) {
                                    animateCounter(stat, value, 2000);
                                    stat.textContent = '$' + value + 'M';
                                } else {
                                    stat.textContent = '$' + value.toFixed(2);
                                }
                            } else if (text.includes('%')) {
                                const value = parseFloat(text.replace('%', ''));
                                animateCounter(stat, value, 1500);
                                stat.textContent = '+' + value + '%';
                            }
                        }, index * 200);
                    });
                }
            }
        });
    }, observerOptions);

    // Observe sections for animations
    const sections = document.querySelectorAll('section, .feature-card, .timeline-item');
    sections.forEach(section => {
        observer.observe(section);
    });

    // Dynamic particle system
    function createParticle() {
        const particle = document.createElement('div');
        particle.className = 'dynamic-particle';
        particle.style.cssText = `
            position: fixed;
            width: 2px;
            height: 2px;
            background: ${getRandomColor()};
            border-radius: 50%;
            pointer-events: none;
            z-index: 1;
            opacity: 0.8;
        `;
        
        document.body.appendChild(particle);
        
        // Random starting position
        const startX = Math.random() * window.innerWidth;
        const startY = window.innerHeight + 10;
        
        particle.style.left = startX + 'px';
        particle.style.top = startY + 'px';
        
        // Animate particle
        const duration = 3000 + Math.random() * 2000;
        const endY = -10;
        const endX = startX + (Math.random() - 0.5) * 100;
        
        particle.animate([
            { transform: `translate(0, 0) scale(0)`, opacity: 0 },
            { transform: `translate(0, -50px) scale(1)`, opacity: 0.8, offset: 0.1 },
            { transform: `translate(${endX - startX}px, ${endY - startY}px) scale(0)`, opacity: 0 }
        ], {
            duration: duration,
            easing: 'cubic-bezier(0.25, 0.46, 0.45, 0.94)'
        }).onfinish = () => {
            particle.remove();
        };
    }

    function getRandomColor() {
        const colors = ['#6a0dad', '#39ff14', '#ffd700', '#50c878', '#9966cc'];
        return colors[Math.floor(Math.random() * colors.length)];
    }

    // Create particles periodically
    setInterval(createParticle, 800);

    // Wallet connection simulation
    const connectButton = document.querySelector('.btn-connect');
    if (connectButton) {
        connectButton.addEventListener('click', function() {
            this.textContent = 'Connecting...';
            this.style.background = 'linear-gradient(45deg, #39ff14, #50c878)';
            
            setTimeout(() => {
                this.textContent = 'Wallet Connected';
                this.style.background = 'linear-gradient(45deg, #6a0dad, #8e44ad)';
            }, 2000);
            
            setTimeout(() => {
                this.textContent = 'Connect Wallet';
                this.style.background = 'linear-gradient(45deg, #6a0dad, #8e44ad)';
            }, 5000);
        });
    }

    // Price ticker animation
    function updatePriceTicker() {
        const priceElement = document.querySelector('.stat-value');
        if (priceElement && priceElement.textContent.includes('$')) {
            const currentPrice = 2.45;
            const change = (Math.random() - 0.5) * 0.1;
            const newPrice = Math.max(0.01, currentPrice + change);
            
            priceElement.textContent = '$' + newPrice.toFixed(2);
            
            // Add flash effect
            priceElement.style.color = change > 0 ? '#39ff14' : '#ff3939';
            setTimeout(() => {
                priceElement.style.color = '#39ff14';
            }, 500);
        }
    }

    // Update price every 3 seconds
    setInterval(updatePriceTicker, 3000);

    // Glowing border effect on cards
    const cards = document.querySelectorAll('.feature-card, .token-detail');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.boxShadow = `0 0 30px rgba(57, 255, 20, 0.4)`;
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.boxShadow = '';
        });
    });

    // Matrix rain effect (background enhancement)
    function createMatrixRain() {
        const canvas = document.createElement('canvas');
        canvas.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.1;
            pointer-events: none;
        `;
        document.body.appendChild(canvas);
        
        const ctx = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        
        const chars = '01';
        const fontSize = 14;
        const columns = canvas.width / fontSize;
        const drops = [];
        
        for (let i = 0; i < columns; i++) {
            drops[i] = 1;
        }
        
        function draw() {
            ctx.fillStyle = 'rgba(10, 10, 10, 0.05)';
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            
            ctx.fillStyle = '#39ff14';
            ctx.font = fontSize + 'px monospace';
            
            for (let i = 0; i < drops.length; i++) {
                const text = chars[Math.floor(Math.random() * chars.length)];
                ctx.fillText(text, i * fontSize, drops[i] * fontSize);
                
                if (drops[i] * fontSize > canvas.height && Math.random() > 0.975) {
                    drops[i] = 0;
                }
                drops[i]++;
            }
        }
        
        setInterval(draw, 100);
        
        // Resize handler
        window.addEventListener('resize', () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        });
    }

    // Initialize matrix rain effect
    createMatrixRain();
});

// Add CSS animations via JavaScript
const style = document.createElement('style');
style.textContent = `
    .animate-in {
        animation: slideInUp 0.8s ease-out forwards;
    }
    
    @keyframes slideInUp {
        from {
            transform: translateY(30px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    
    .dynamic-particle {
        box-shadow: 0 0 6px currentColor;
    }
`;
document.head.appendChild(style);