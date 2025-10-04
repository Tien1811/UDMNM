<?php
/**
 * Test page để kiểm tra hiển thị ảnh
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="test-section section-padding">
        <div class="container">
            <h1>Test Images</h1>
            
            <div class="gallery-grid">
                <?php
                $test_images = [
                    [
                        'title' => 'Test Image 1',
                        'image' => 'https://images.unsplash.com/photo-1525625293386-3f8f99389edd?w=800&h=600&fit=crop'
                    ],
                    [
                        'title' => 'Test Image 2', 
                        'image' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=800&h=600&fit=crop'
                    ],
                    [
                        'title' => 'Test Image 3',
                        'image' => 'https://images.unsplash.com/photo-1490806843957-31f4c9a91c65?w=800&h=600&fit=crop'
                    ],
                    [
                        'title' => 'Test Image 4',
                        'image' => 'https://images.unsplash.com/photo-1522383225653-ed111181a951?w=800&h=600&fit=crop'
                    ]
                ];
                
                foreach ($test_images as $item) {
                    echo '<div class="gallery-item">';
                    echo '<div class="gallery-item-content">';
                    echo '<h4 class="gallery-item-title">' . esc_html($item['title']) . '</h4>';
                    echo '<div class="gallery-image">';
                    echo '<img src="' . esc_url($item['image']) . '" class="gallery-img" alt="' . esc_attr($item['title']) . '">';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>
</main>

<style>
.test-section {
    padding: 40px 0;
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    margin-top: 40px;
}

.gallery-item {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.gallery-item-content {
    position: relative;
    overflow: hidden;
    border-radius: 12px;
}

.gallery-image {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    background-color: #f0f0f0;
    min-height: 250px;
}

.gallery-img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: transform 0.3s ease;
    border-radius: 8px;
    display: block;
    background-color: #f0f0f0;
}

.gallery-item-title {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0,0,0,0.8));
    color: white;
    padding: 20px 15px 15px;
    margin: 0;
    font-size: 1.1rem;
    font-weight: 600;
    text-shadow: 0 1px 3px rgba(0,0,0,0.5);
}

.gallery-item:hover .gallery-img {
    transform: scale(1.05);
}
</style>

<?php get_footer(); ?>

