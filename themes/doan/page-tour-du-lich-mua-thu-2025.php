<?php
/**
 * Template Name: Tour Du Lịch Mùa Thu 2025
 * Description: Trang tour du lịch mùa thu 2025 với thông tin chi tiết
 */

get_header();

$page_id = get_queried_object_id();
?>

<main id="primary" class="site-main">
    <section class="tour-hero section-padding">
        <div class="container">
            <div class="tour-hero-content">
                <h1 class="tour-title">Tour Du Lịch Mùa Thu 2025</h1>
                <p class="tour-subtitle">Khám phá vẻ đẹp mùa thu Nhật Bản với những trải nghiệm tuyệt vời</p>
                
                <div class="tour-highlights">
                    <div class="highlight-item">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Thời gian: Tháng 10-11/2025</span>
                    </div>
                    <div class="highlight-item">
                        <i class="fas fa-users"></i>
                        <span>Nhóm: 15-20 người</span>
                    </div>
                    <div class="highlight-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Điểm đến: Tokyo, Kyoto, Osaka</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tour-details section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="tour-content">
                        <h2>Lịch trình chi tiết</h2>
                        
                        <?php
                        // Lấy dữ liệu từ custom post type "schedule" (Lịch trình chi tiết)
                        $schedule_query = new WP_Query(array(
                            'post_type'      => 'schedule',
                            'posts_per_page' => -1,
                            'post_status'    => 'publish',
                            'orderby'        => 'menu_order',
                            'order'          => 'ASC'
                        ));

                        if ($schedule_query->have_posts()) :
                            $day_counter = 0;
                            while ($schedule_query->have_posts()) : $schedule_query->the_post();
                                $post_id = get_the_ID();
                                $post_title = get_the_title();
                                $post_content = get_the_content();
                                $day_counter++;
                                
                                echo '<div class="itinerary-day" data-day="' . $day_counter . '" data-post-id="' . $post_id . '">';
                                echo '<h3 class="day-title">' . esc_html($post_title) . '</h3>';
                                echo '<div class="itinerary-content">';
                                
                                // Hiển thị featured image nếu có
                                if (has_post_thumbnail()) {
                                    echo '<div class="itinerary-image">';
                                    the_post_thumbnail('medium', array('class' => 'schedule-img'));
                                    echo '</div>';
                                }
                                
                                // Hiển thị nội dung
                                if ($post_content) {
                                    echo '<div class="itinerary-text">';
                                    echo wp_kses_post($post_content);
                                    echo '</div>';
                                }
                                
                                echo '</div>';
                                echo '</div>';
                            endwhile;
                            wp_reset_postdata();
                        else :
                            // Fallback nếu không có dữ liệu
                            echo '<div class="itinerary-day" data-day="1">';
                            echo '<h3 class="day-title">Ngày 1: Hà Nội - Tokyo</h3>';
                            echo '<p>Khởi hành từ Hà Nội, đáp xuống sân bay Narita. Tham quan khu vực Asakusa và Senso-ji Temple.</p>';
                            echo '</div>';
                            
                            echo '<div class="itinerary-day" data-day="2">';
                            echo '<h3 class="day-title">Ngày 2: Tokyo - Tham quan thành phố</h3>';
                            echo '<p>Tham quan Tokyo Skytree, khu vực Shibuya, Harajuku. Trải nghiệm văn hóa Nhật Bản.</p>';
                            echo '</div>';
                            
                            echo '<div class="itinerary-day" data-day="3">';
                            echo '<h3 class="day-title">Ngày 3: Tokyo - Kyoto</h3>';
                            echo '<p>Di chuyển đến Kyoto bằng shinkansen. Tham quan Fushimi Inari Shrine và Kiyomizu-dera.</p>';
                            echo '</div>';
                        endif;
                        ?>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="tour-sidebar">
                        <div class="tour-info-card">
                            <h3>Thông tin tour</h3>
                            <div class="info-item">
                                <strong>Giá tour:</strong>
                                <span class="price">25.990.000 VNĐ</span>
                            </div>
                            <div class="info-item">
                                <strong>Thời gian:</strong>
                                <span>6 ngày 5 đêm</span>
                            </div>
                            <div class="info-item">
                                <strong>Khởi hành:</strong>
                                <span>Tháng 10-11/2025</span>
                            </div>
                            <div class="info-item">
                                <strong>Phương tiện:</strong>
                                <span>Máy bay + Shinkansen</span>
                            </div>
                        </div>
                        
                        <div class="booking-card">
                            <h3>Đặt tour ngay</h3>
                            <p>Liên hệ để được tư vấn chi tiết</p>
                            <a href="<?php echo esc_url(home_url('/dang-ky-tu-van')); ?>" class="btn btn-primary btn-lg">
                                <i class="fas fa-phone"></i> Đăng ký tư vấn
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<style>
/* CSS Variables */
:root {
    --primary-color: #388e3c;
    --primary-dark: #2e7d32;
    --accent-color: #ff9800;
    --text-dark: #333;
    --text-light: #666;
    --bg-light: #f8f9fa;
    --border-color: #dee2e6;
    --shadow: 0 4px 12px rgba(0,0,0,0.1);
    --shadow-hover: 0 8px 25px rgba(0,0,0,0.15);
}

/* Tour Hero Section */
.tour-hero {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    text-align: center;
    padding: 100px 0;
    position: relative;
    overflow: hidden;
}

.tour-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    opacity: 0.1;
}

.tour-title {
    font-size: 3.5rem;
    font-weight: 900;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    animation: fadeInUp 1s ease-out;
}

.tour-subtitle {
    font-size: 1.3rem;
    opacity: 0.95;
    margin-bottom: 50px;
    animation: fadeInUp 1s ease-out 0.2s both;
}

.tour-highlights {
    display: flex;
    justify-content: center;
    gap: 50px;
    flex-wrap: wrap;
    animation: fadeInUp 1s ease-out 0.4s both;
}

.highlight-item {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 1.1rem;
    font-weight: 500;
    background: rgba(255,255,255,0.1);
    padding: 12px 20px;
    border-radius: 25px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.2);
    transition: all 0.3s ease;
}

.highlight-item:hover {
    background: rgba(255,255,255,0.2);
    transform: translateY(-2px);
}

.highlight-item i {
    font-size: 1.6rem;
    color: var(--accent-color);
}

/* Tour Content */
.tour-content {
    padding: 80px 0;
    background: white;
}

.tour-content h2 {
    color: var(--primary-color);
    margin-bottom: 40px;
    font-size: 2.5rem;
    font-weight: 700;
    text-align: center;
    position: relative;
}

.tour-content h2::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 4px;
    background: var(--accent-color);
    border-radius: 2px;
}

/* Itinerary Section */
.itinerary-day {
    background: white;
    padding: 30px;
    margin-bottom: 25px;
    border-radius: 15px;
    box-shadow: var(--shadow);
    border-left: 5px solid var(--primary-color);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.itinerary-day::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
    opacity: 0;
    transition: opacity 0.3s ease;
}

.itinerary-day:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-hover);
}

.itinerary-day:hover::before {
    opacity: 1;
}

.itinerary-day.active {
    border-left-color: var(--accent-color);
    box-shadow: var(--shadow-hover);
}

.day-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 20px;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    padding-left: 30px;
}

.day-title::before {
    content: '📍';
    position: absolute;
    left: 0;
    top: 0;
    font-size: 1.2rem;
    transition: transform 0.3s ease;
}

.day-title:hover {
    color: var(--primary-dark);
    transform: translateX(5px);
}

.day-title:hover::before {
    transform: scale(1.2);
}

.day-content {
    color: var(--text-light);
    line-height: 1.7;
    font-size: 1.05rem;
}

.itinerary-content {
    display: flex;
    gap: 25px;
    align-items: flex-start;
    margin-top: 20px;
}

.itinerary-image {
    flex-shrink: 0;
    width: 220px;
    height: 160px;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: all 0.3s ease;
}

.itinerary-image:hover {
    transform: scale(1.02);
    box-shadow: var(--shadow-hover);
}

.schedule-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.schedule-img:hover {
    transform: scale(1.05);
}

.itinerary-text {
    flex: 1;
    padding: 10px 0;
}

/* Section Styling */
.section-padding {
    padding: 100px 0;
}

.bg-light {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.section-title {
    text-align: center;
    color: var(--primary-color);
    margin-bottom: 60px;
    font-size: 2.8rem;
    font-weight: 700;
    position: relative;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -15px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
    border-radius: 2px;
}

/* Active States */
.itinerary-day.active .day-title {
    color: var(--accent-color);
    font-weight: 800;
    font-size: 1.3rem;
}

.itinerary-day.active .day-title::before {
    content: '⭐';
    transform: scale(1.3);
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

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .tour-title {
        font-size: 2.5rem;
    }
    
    .tour-subtitle {
        font-size: 1.1rem;
    }
    
    .tour-highlights {
        flex-direction: column;
        gap: 20px;
        align-items: center;
    }
    
    .highlight-item {
        width: 100%;
        max-width: 300px;
        justify-content: center;
    }
    
    .itinerary-content {
        flex-direction: column;
    }
    
    .itinerary-image {
        width: 100%;
        height: 200px;
        margin-bottom: 20px;
    }
    
    .section-title {
        font-size: 2.2rem;
    }
    
    .tour-content h2 {
        font-size: 2rem;
    }
    
    .itinerary-day {
        padding: 20px;
    }
    
    .day-title {
        font-size: 1.3rem;
    }
}

@media (max-width: 480px) {
    .tour-hero {
        padding: 60px 0;
    }
    
    .tour-title {
        font-size: 2rem;
    }
    
    .section-padding {
        padding: 60px 0;
    }
    
    .itinerary-day {
        padding: 15px;
    }
}







.itinerary-day {
    background: white;
    padding: 25px;
    margin-bottom: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    border-left: 4px solid var(--primary-color);
}

.itinerary-day h3 {
    color: var(--primary-color);
    margin-bottom: 15px;
}

.day-title {
    cursor: pointer;
    transition: all 0.3s ease;
    padding: 10px;
    border-radius: 8px;
    border: 2px solid transparent;
}

.day-title:hover {
    background-color: rgba(0,123,255,0.1);
    border-color: var(--primary-color);
}

.day-title.active {
    background-color: var(--primary-color);
    color: white;
    border-color: var(--primary-color);
}








.itinerary-content {
    display: flex;
    gap: 20px;
    align-items: flex-start;
}

.itinerary-image {
    flex: 0 0 200px;
}

.schedule-img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.itinerary-text {
    flex: 1;
}

.itinerary-text p {
    margin-bottom: 10px;
    line-height: 1.6;
}

@media (max-width: 768px) {
    .itinerary-content {
        flex-direction: column;
    }
    
    .itinerary-image {
        flex: none;
        width: 100%;
    }
    
    .schedule-img {
        height: 200px;
    }
}

.tour-info-card, .booking-card {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    margin-bottom: 30px;
}

.info-item {
    display: flex;
    justify-content: space-between;
    padding: 15px 0;
    border-bottom: 1px solid #eee;
}

.info-item:last-child {
    border-bottom: none;
}

.price {
    color: var(--primary-color);
    font-weight: bold;
    font-size: 1.2rem;
}






.section-title {
    text-align: center;
    color: var(--primary-color);
    margin-bottom: 40px;
    font-size: 2.5rem;
    font-weight: 700;
}

.no-images-message {
    grid-column: 1 / -1;
    text-align: center;
    padding: 40px 20px;
    background: #f8f9fa;
    border-radius: 12px;
    border: 2px dashed #dee2e6;
}

.no-images-message p {
    color: #6c757d;
    font-size: 1.1rem;
    margin: 0;
}

@media (max-width: 768px) {
    .tour-title {
        font-size: 2rem;
    }
    
    .tour-highlights {
        flex-direction: column;
        gap: 20px;
    }
    
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
    }
}
</style>


<?php get_footer(); ?>
