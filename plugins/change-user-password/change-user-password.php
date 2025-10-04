<?php
/**
 * Plugin Name: Change User Password (Simple)
 * Description: Admin page để thay đổi mật khẩu người dùng. Sử dụng API WordPress để đảm bảo mật khẩu được hash an toàn.
 * Version: 1.0
 * Author: hau
 * Text Domain: change-user-password
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // tránh truy cập trực tiếp
}

/**
 * Thêm trang trong menu Admin
 */
add_action( 'admin_menu', function () {
    add_users_page(
        __( 'Change User Password', 'change-user-password' ),
        __( 'Change User Password', 'change-user-password' ),
        'edit_users', // quyền cần thiết (admin hoặc role có edit_users)
        'change-user-password',
        'cup_render_admin_page'
    );
});

/**
 * Render form và xử lý submit
 */
function cup_render_admin_page() {
    if ( ! current_user_can( 'edit_users' ) ) {
        wp_die( __( 'Bạn không có quyền truy cập trang này.', 'change-user-password' ) );
    }

    // xử lý form khi submit
    if ( isset( $_POST['cup_action'] ) && $_POST['cup_action'] === 'change_password' ) {
        // kiểm tra nonce
        if ( ! isset( $_POST['cup_nonce'] ) || ! wp_verify_nonce( $_POST['cup_nonce'], 'cup_change_pass' ) ) {
            echo '<div class="notice notice-error"><p>Nonce không hợp lệ. Hãy thử lại.</p></div>';
        } else {
            $user_id = intval( $_POST['cup_user_id'] ?? 0 );
            $pass1   = $_POST['cup_pass1'] ?? '';
            $pass2   = $_POST['cup_pass2'] ?? '';

            // basic validation
            if ( $user_id <= 0 ) {
                echo '<div class="notice notice-error"><p>Vui lòng chọn người dùng hợp lệ.</p></div>';
            } elseif ( empty( $pass1 ) ) {
                echo '<div class="notice notice-error"><p>Mật khẩu không được để trống.</p></div>';
            } elseif ( $pass1 !== $pass2 ) {
                echo '<div class="notice notice-error"><p>Hai mật khẩu không khớp.</p></div>';
            } else {
                // (Tùy chọn) kiểm tra độ mạnh mật khẩu (nếu muốn)
                // $strength = wp_check_password_strength( $pass1 ); // không có sẵn chuẩn function; nếu muốn có thể implement

                // Cập nhật mật khẩu - WP sẽ tự hash khi dùng wp_set_password hoặc wp_update_user
                // Sử dụng wp_set_password -> sẽ đăng xuất user hiện tại nếu họ là nạn nhân. Đây là cách an toàn.
                wp_set_password( $pass1, $user_id );

                // Thông báo thành công
                echo '<div class="notice notice-success"><p>Mật khẩu đã được cập nhật và được mã hóa an toàn.</p></div>';
            }
        }
    }

    // Lấy danh sách user (giới hạn)
    $users = get_users( array( 'orderby' => 'display_name' ) );

    // Form HTML
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'Change User Password', 'change-user-password' ); ?></h1>

        <form method="post" style="max-width:600px;">
            <?php wp_nonce_field( 'cup_change_pass', 'cup_nonce' ); ?>
            <input type="hidden" name="cup_action" value="change_password">

            <table class="form-table">
                <tbody>
                <tr>
                    <th><label for="cup_user_id"><?php esc_html_e( 'User', 'change-user-password' ); ?></label></th>
                    <td>
                        <select name="cup_user_id" id="cup_user_id" required style="min-width:300px;">
                            <option value=""><?php esc_html_e( '-- Chọn người dùng --', 'change-user-password' ); ?></option>
                            <?php foreach ( $users as $u ) : ?>
                                <option value="<?php echo esc_attr( $u->ID ); ?>">
                                    <?php echo esc_html( $u->user_login . ' — ' . ( $u->display_name ?: $u->user_email ) ); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <p class="description">Bạn cần có quyền <code>edit_users</code> để sử dụng chức năng này.</p>
                    </td>
                </tr>

                <tr>
                    <th><label for="cup_pass1"><?php esc_html_e( 'New password', 'change-user-password' ); ?></label></th>
                    <td><input name="cup_pass1" id="cup_pass1" type="password" required maxlength="255" style="min-width:300px;"></td>
                </tr>

                <tr>
                    <th><label for="cup_pass2"><?php esc_html_e( 'Repeat password', 'change-user-password' ); ?></label></th>
                    <td><input name="cup_pass2" id="cup_pass2" type="password" required maxlength="255" style="min-width:300px;"></td>
                </tr>
                </tbody>
            </table>

            <?php submit_button( __( 'Change Password', 'change-user-password' ) ); ?>
        </form>
    </div>
    <?php
}

