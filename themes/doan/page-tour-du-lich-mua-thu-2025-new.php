<?php
/**
 * Template Name: Tour Du Lịch Mùa Thu 2025 - Modern Design
 * Description: Trang tour du lịch mùa thu 2025 với design hiện đại
 */

get_header();

// Enqueue modern tour CSS
wp_enqueue_style('tour-modern-css', get_template_directory_uri() . '/assets/css/tour-modern.css', array(), '1.0.0');

$page_id = get_queried_object_id();
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="tour-hero">
        <div class="tour-hero-content">
            <h1 class="tour-title">Tour Du Lịch Mùa Thu 2025</h1>
            <p class="tour-subtitle">Khám phá vẻ đẹp mùa thu Nhật Bản với những trải nghiệm tuyệt vời và đáng nhớ</p>
            
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
                <div class="highlight-item">
                    <i class="fas fa-plane"></i>
                    <span>Phương tiện: Máy bay + Shinkansen</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Tour Details Section -->
    <section class="tour-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="tour-content">
                        <h2>Lịch trình chi tiết</h2>
                        
                        <div class="itinerary-day">
                            <h3>Ngày 1: Hà Nội - Tokyo</h3>
                            <p>Khởi hành từ Hà Nội, đáp xuống sân bay Narita. Tham quan khu vực Asakusa và Senso-ji Temple - ngôi chùa cổ nhất Tokyo. Trải nghiệm văn hóa truyền thống Nhật Bản tại khu phố cổ.</p>
                        </div>
                        
                        <div class="itinerary-day">
                            <h3>Ngày 2: Tokyo - Tham quan thành phố</h3>
                            <p>Tham quan Tokyo Skytree - tháp truyền hình cao nhất thế giới, khu vực Shibuya với giao lộ đông người nhất thế giới, Harajuku - trung tâm thời trang của giới trẻ Nhật Bản.</p>
                        </div>
                        
                        <div class="itinerary-day">
                            <h3>Ngày 3: Tokyo - Kyoto</h3>
                            <p>Di chuyển đến Kyoto bằng shinkansen - tàu cao tốc nổi tiếng của Nhật Bản. Tham quan Fushimi Inari Shrine với hàng ngàn cổng torii màu đỏ và Kiyomizu-dera - ngôi chùa gỗ cổ kính.</p>
                        </div>
                        
                        <div class="itinerary-day">
                            <h3>Ngày 4: Kyoto - Tham quan đền chùa</h3>
                            <p>Tham quan Kinkaku-ji (Golden Pavilion) - ngôi chùa dát vàng nổi tiếng, Ryoan-ji Temple với khu vườn đá thiền. Trải nghiệm văn hóa truyền thống Nhật Bản qua nghệ thuật trà đạo.</p>
                        </div>
                        
                        <div class="itinerary-day">
                            <h3>Ngày 5: Kyoto - Osaka</h3>
                            <p>Di chuyển đến Osaka - thành phố ẩm thực của Nhật Bản. Tham quan Osaka Castle - lâu đài lịch sử và Dotonbori - khu phố ẩm thực sôi động. Thưởng thức takoyaki và okonomiyaki.</p>
                        </div>
                        
                        <div class="itinerary-day">
                            <h3>Ngày 6: Osaka - Hà Nội</h3>
                            <p>Mua sắm tại khu vực Namba với các trung tâm thương mại hiện đại. Khởi hành về Hà Nội với những kỷ niệm đẹp về đất nước mặt trời mọc.</p>
                        </div>
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
                            <div class="info-item">
                                <strong>Khách sạn:</strong>
                                <span>4-5 sao</span>
                            </div>
                            <div class="info-item">
                                <strong>Bao gồm:</strong>
                                <span>Vé máy bay, khách sạn, ăn uống</span>
                            </div>
                        </div>
                        
                        <div class="booking-card">
                            <h3>Đặt tour ngay</h3>
                            <p>Liên hệ để được tư vấn chi tiết và nhận ưu đãi đặc biệt</p>
                            <a href="<?php echo esc_url(home_url('/dang-ky-tu-van')); ?>" class="btn btn-primary btn-lg">
                                <i class="fas fa-phone"></i> Đăng ký tư vấn
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="tour-gallery">
        <div class="container">
            <h2 class="section-title">Hình ảnh tour</h2>
            
            <?php if (current_user_can('administrator')) : ?>
            <div style="text-align: center; margin-bottom: 20px;">
                <button onclick="forceCreateSampleData()" style="background: var(--primary-color); color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                    Force Tạo Dữ Liệu Mẫu
                </button>
            </div>
            <script>
            function forceCreateSampleData() {
                fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'action=force_create_sample_data'
                })
                .then(response => response.text())
                .then(data => {
                    alert('Dữ liệu đã được tạo! Vui lòng refresh trang.');
                    location.reload();
                })
                .catch(error => {
                    alert('Lỗi: ' + error);
                });
            }
            </script>
            <?php endif; ?>
            
            <div class="gallery-grid">
                <?php
                // Lấy hình ảnh từ custom post type "diem-den" (Hình ảnh thực tế)
                $destinations_query = new WP_Query(array(
                    'post_type'      => 'diem-den',
                    'posts_per_page' => 8,
                    'post_status'    => 'publish',
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC'
                ));

                if ($destinations_query->have_posts()) :
                    while ($destinations_query->have_posts()) : $destinations_query->the_post();
                        $post_id = get_the_ID();
                        $post_title = get_the_title();
                        
                        echo '<div class="gallery-item">';
                        echo '<div class="gallery-item-content">';
                        echo '<h4 class="gallery-item-title">' . esc_html($post_title) . '</h4>';
                        echo '<div class="gallery-image">';
                        
                        // Thử lấy featured image trước
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('large', array('class' => 'gallery-img', 'alt' => $post_title));
                        } else {
                            // Nếu không có featured image, lấy attached images
                            $attachments = get_children(array(
                                'post_parent'    => $post_id,
                                'post_type'      => 'attachment',
                                'post_mime_type' => 'image',
                                'orderby'        => 'menu_order ID',
                                'order'          => 'ASC',
                                'numberposts'    => 1,
                            ));
                            
                            if ($attachments) {
                                foreach ($attachments as $attachment) {
                                    echo wp_get_attachment_image($attachment->ID, 'large', false, array('class' => 'gallery-img', 'alt' => $post_title));
                                }
                            } else {
                                // Fallback: hiển thị placeholder với màu gradient
                                echo '<div class="placeholder-content">';
                                echo '<i class="fas fa-camera"></i>';
                                echo '<span>' . esc_html($post_title) . '</span>';
                                echo '</div>';
                            }
                        }
                        
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Hiển thị hình ảnh mẫu nếu không có dữ liệu
                    $sample_images = [
                        ['title' => 'Tokyo Skyline', 'url' => 'https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?w=800&h=600&fit=crop'],
                        ['title' => 'Kyoto Temple', 'url' => 'https://images.unsplash.com/photo-1540959733332-eab4deabeeaf?w=800&h=600&fit=crop'],
                        ['title' => 'Osaka Castle', 'url' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800&h=600&fit=crop'],
                        ['title' => 'Japan Autumn', 'url' => 'https://images.unsplash.com/photo-1490806843957-31f4c9a91c65?w=800&h=600&fit=crop']
                    ];
                    
                    foreach ($sample_images as $img) {
                        echo '<div class="gallery-item">';
                        echo '<div class="gallery-item-content">';
                        echo '<h4 class="gallery-item-title">' . esc_html($img['title']) . '</h4>';
                        echo '<div class="gallery-image">';
                        echo '<img src="' . esc_url($img['url']) . '" alt="' . esc_attr($img['title']) . '" class="gallery-img">';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                endif;
                ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>

