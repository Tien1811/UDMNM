/**
 * Modern Banner JavaScript
 * Handles banner animations, parallax effects, and interactions
 */

(function($) {
    'use strict';

    // Wait for DOM to be ready
    $(document).ready(function() {
        
        // Initialize banner
        initBanner();
        
        // Initialize parallax
        initParallax();
        
        // Initialize animations
        initAnimations();
        
        // Initialize video banner
        initVideoBanner();
        
    });

    /**
     * Initialize banner functionality
     */
    function initBanner() {
        // Add floating elements
        addFloatingElements();
        
        // Smooth scroll for CTA buttons
        $('.btn-hero[href^="#"]').on('click', function(e) {
            e.preventDefault();
            const target = $(this.getAttribute('href'));
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 1000, 'easeInOutCubic');
            }
        });
        
        // Add scroll indicator
        addScrollIndicator();
    }

    /**
     * Add floating elements to banner
     */
    function addFloatingElements() {
        const floatingIcons = [
            'fas fa-plane',
            'fas fa-mountain',
            'fas fa-camera',
            'fas fa-map-marker-alt',
            'fas fa-sun',
            'fas fa-star',
            'fas fa-heart',
            'fas fa-compass',
            'fas fa-globe',
            'fas fa-umbrella-beach',
            'fas fa-passport',
            'fas fa-suitcase'
        ];
        
        const $banner = $('.hero-banner, .video-banner, .image-banner, .parallax-banner');
        
        if ($banner.length) {
            // Add floating icons
            const $floatingContainer = $('<div class="floating-elements"></div>');
            
            // Add 8-12 floating elements
            for (let i = 0; i < 10; i++) {
                const icon = floatingIcons[Math.floor(Math.random() * floatingIcons.length)];
                const $element = $(`<div class="floating-element"><i class="${icon}"></i></div>`);
                
                // Random positioning and animation
                $element.css({
                    top: Math.random() * 80 + 10 + '%',
                    left: Math.random() * 80 + 10 + '%',
                    animationDelay: Math.random() * 8 + 's',
                    animationDuration: (Math.random() * 6 + 6) + 's',
                    transform: `rotate(${Math.random() * 360}deg) scale(${Math.random() * 0.5 + 0.5})`
                });
                
                $floatingContainer.append($element);
            }
            
            $banner.append($floatingContainer);
            
            // Add realistic particles
            addParticles();
        }
    }

    /**
     * Add realistic floating particles
     */
    function addParticles() {
        const $banner = $('.hero-banner, .video-banner, .image-banner, .parallax-banner');
        
        if ($banner.length) {
            const $particleContainer = $('<div class="particle-container"></div>');
            
            // Add 15-20 particles
            for (let i = 0; i < 18; i++) {
                const $particle = $('<div class="particle"></div>');
                
                // Random size and position
                const size = Math.random() * 4 + 2; // 2-6px
                const left = Math.random() * 100; // 0-100%
                const delay = Math.random() * 8; // 0-8s delay
                const duration = Math.random() * 4 + 6; // 6-10s duration
                
                $particle.css({
                    width: size + 'px',
                    height: size + 'px',
                    left: left + '%',
                    animationDelay: delay + 's',
                    animationDuration: duration + 's'
                });
                
                $particleContainer.append($particle);
            }
            
            $banner.append($particleContainer);
        }
    }

    /**
     * Add scroll indicator
     */
    function addScrollIndicator() {
        const $banner = $('.hero-banner, .video-banner, .image-banner, .parallax-banner');
        
        if ($banner.length) {
            const $indicator = $(`
                <div class="scroll-indicator">
                    <i class="fas fa-chevron-down"></i>
                </div>
            `);
            
            $banner.append($indicator);
            
            // Hide on scroll using rAF + passive
            let hidden = false, ticking = false;
            function update(){
                const s = window.pageYOffset > 100;
                if (s !== hidden){
                    hidden = s;
                    $indicator.stop(true,true)[hidden ? 'fadeOut' : 'fadeIn']();
                }
                ticking = false;
            }
            function onScroll(){ if (!ticking){ requestAnimationFrame(update); ticking = true; } }
            window.addEventListener('scroll', onScroll, { passive: true });
        }
    }

    /**
     * Initialize parallax effects
     */
    function initParallax() {
        const $parallaxElements = $('.parallax-banner, .image-banner, .hero-banner');
        if (!$parallaxElements.length) return;

        // Cache metrics to avoid layout reads each scroll
        let items = [];
        function recalc(){
            items = [];
            const wh = window.innerHeight;
            $parallaxElements.each(function(){
                const $el = $(this);
                const rect = this.getBoundingClientRect();
                const top = rect.top + window.pageYOffset;
                const height = rect.height;
                items.push({ el: this, $el: $el, top: top, height: height, speed: $el.data('speed') || 0.5 });
            });
        }
        recalc();

        let ticking = false;
        function updateParallax(){
            const scrolled = window.pageYOffset;
            const wh = window.innerHeight;
            items.forEach(function(it){
                if (scrolled + wh > it.top && scrolled < it.top + it.height) {
                    const yPos = -(scrolled - it.top) * it.speed;
                    it.el.style.transform = `translateY(${yPos}px)`;
                }
            });
            // Update floating elements
            updateFloatingElements(scrolled);
            ticking = false;
        }
        function onScroll(){ if (!ticking) { requestAnimationFrame(updateParallax); ticking = true; } }
        function onResize(){ recalc(); updateParallax(); }
        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', onResize, { passive: true });
    }

    /**
     * Update floating elements based on scroll
     */
    function updateFloatingElements(scrolled) {
        const $floatingElements = $('.floating-element');
        const $particles = $('.particle');
        
        $floatingElements.each(function(index) {
            const $this = $(this);
            const speed = 0.1 + (index * 0.05); // Different speeds for each element
            const yPos = scrolled * speed;
            const xPos = Math.sin(scrolled * 0.001 + index) * 10;
            $this.css('transform', `translate(${xPos}px, ${yPos}px) rotate(${scrolled * 0.1}deg)`);
        });
        
        $particles.each(function(index) {
            const $this = $(this);
            const speed = 0.05 + (index * 0.02);
            const yPos = scrolled * speed;
            const xPos = Math.cos(scrolled * 0.0008 + index) * 5;
            $this.css('transform', `translate(${xPos}px, ${yPos}px)`);
        });
    }

    /**
     * Initialize animations
     */
    function initAnimations() {
        // Intersection Observer for animations
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            // Observe elements for animation
            $('.hero-content, .stat-item, .floating-element').each(function() {
                observer.observe(this);
            });
        }

        // Counter animation for stats
        $('.stat-number').each(function() {
            const $this = $(this);
            const countTo = parseInt($this.text());
            
            $({ countNum: 0 }).animate({
                countNum: countTo
            }, {
                duration: 2000,
                easing: 'swing',
                step: function() {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                    $this.text(countTo);
                }
            });
        });
    }

    /**
     * Initialize video banner
     */
    function initVideoBanner() {
        const $videoBanner = $('.video-banner');
        
        if ($videoBanner.length) {
            const $video = $videoBanner.find('video');
            
            if ($video.length) {
                // Play video on load
                $video[0].play().catch(e => {
                    console.log('Video autoplay failed:', e);
                });
                
                // Pause video when not in view
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            $video[0].play();
                        } else {
                            $video[0].pause();
                        }
                    });
                });
                
                observer.observe($videoBanner[0]);
            }
        }
    }


    /**
     * Add smooth scrolling
     */
    function addSmoothScrolling() {
        $('a[href*="#"]:not([href="#"])').on('click', function(e) {
            const target = $(this.hash);
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 1000, 'easeInOutCubic');
            }
        });
    }

    /**
     * Add easing function
     */
    $.easing.easeInOutCubic = function (x, t, b, c, d) {
        if ((t/=d/2) < 1) return c/2*t*t*t + b;
        return c/2*((t-=2)*t*t + 2) + b;
    };

    /**
     * Initialize banner on window load
     */
    $(window).on('load', function() {
        // Trigger banner animations
        $('.hero-content').addClass('animate-in');
        
        // Add stagger effect to buttons
        $('.btn-hero').each(function(index) {
            $(this).css('animation-delay', (index * 0.1) + 's');
        });
    });

    /**
     * Handle window resize
     */
    // Avoid re-initializing listeners; keep a light resize handler if needed
    // Parallax recalc is bound within initParallax using passive listener

    /**
     * Add CSS for animations
     */
    const style = document.createElement('style');
    style.textContent = `
        .hero-content {
            opacity: 0;
            transform: translateY(30px);
            transition: all 1s ease-out;
        }
        
        .hero-content.animate-in {
            opacity: 1;
            transform: translateY(0);
        }
        
        .stat-item {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease-out;
        }
        
        .stat-item.animate-in {
            opacity: 1;
            transform: translateY(0);
        }
        
        .floating-element {
            opacity: 0;
            animation: fadeInFloat 2s ease-out forwards;
        }
        
        @keyframes fadeInFloat {
            to {
                opacity: 0.1;
            }
        }
        
        .btn-hero {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease-out forwards;
        }
        
        .btn-hero:nth-child(1) { animation-delay: 0.2s; }
        .btn-hero:nth-child(2) { animation-delay: 0.4s; }
        .btn-hero:nth-child(3) { animation-delay: 0.6s; }
        
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    `;
    document.head.appendChild(style);

})(jQuery);
